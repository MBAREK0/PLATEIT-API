<?php

namespace App\Http\Controllers\Api\Auth;

use App\Customs\Services\EmailVerificationService;
use App\Customs\Services\JwtTokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPassworRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RefreshRequest;
use App\Http\Requests\ResendEmailVerificationLinkRequest;
use App\Http\Requests\VerifyEmailRequest;
use App\Http\Requests\ResetPassworRequest;
use App\Jobs\DailyRewardsJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendVerificationEmailQueueJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    private $service;
    private $jwtService;

    public function __construct(){
        $this->service = new EmailVerificationService;
        $this->jwtService = new JwtTokenService;
    }

    /**
     * Login method
     */
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email:filter'],
            'password' => ['required','string'],

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data =  $this->jwtService->validateCredentials( $request->email,$request->password );

        if(!$data['error'] ){

            $userIID = $this->jwtService->get_user($data['token'])->id;
            # use it for daily rewards in home controller
            dispatch(new DailyRewardsJob($userIID));
            return $this->responseWithTokrn($data['token'],$data['user']);

        }else{
            return response()->json([
                'status' => 'failed',
                'error'  => $data['error']
            ], $data['http_code']);
        }

    }

     /**
     * Register method
     */
    public function Register(RegisterRequest $request){


        // $validator = Validator::make($request->all(), [
        //     'fullName' => ['required', 'string', 'min:2'],
        //     'email' => ['required', 'string', 'email:filter', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'role' => ['required', 'string', Rule::in(['user', 'restaurant'])], // Enum validation for role
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }
        $user = User::create([
            "fullName"  => $request->fullName,
            "email"     => $request->email,
            'password' => Hash::make($request->password),
            "role"      => $request->role
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            dispatch(new SendVerificationEmailQueueJob($user));
             $token = $this->jwtService->genarateToken($user->id);
             return $this->responseWithTokrn($token,$user);
        }else{
            return response()->json([
                "status"   => 'failed',
                "error"=> "An error accure while trying to create user",
                ],500);
        }

    }

    /**
     * Return jwt access Token
     */
    public function responseWithTokrn($token,$user){
        return response()->json([
            'status'        => 'success',
            'user'          => $user,
            'access_token'  => $token,
            'type'          => 'bearer',
        ],200);
    }


    /**
     * Verify User Email
     *
     * When the user clicks the "verify Email" link in their email,
     * they should be redirected to a specific page in the frontend.
     * The token and email from the link need to be extracted and sent
     * to the 'auth/verify_user_email' endpoint using a POST form.
     * Before doing so, ensure that the path sent to them is correct by
     * checking and possibly modifying it in the App\Customs\Services\EmailVerificationService
     * file, particularly on line 120.
     */
     public function verifyUserEmail(VerifyEmailRequest $request){
        return $this->service->verifyEmail($request->email, $request->token);
     }

   /**
     * resend Verify User Email
     *
     * When the user clicks the " verify Email" link in their email for resend the token ,
     * they should be redirected to the same  specific page in the frontend.
     * The email from the link need to be extracted and sent
     * to the 'auth/resend_email_verification_link' endpoint using a POST form.
     */
     public function resendEmailVerificationLink(ResendEmailVerificationLinkRequest $request){
        
        return $this->service->resendLink($request->email);
     }

     /**
     * Forget Password
     *
     * When a user forgets their password, a token should be generated and sent to the frontend.
     * This token will be used along with the new password for resetting the password.
     */
      public function forgetPassword(ForgetPassworRequest $request){
        return $this->service->forgetPassword($request->email);
      }

      /**
       * Reset Password
       */
      public function resetPassword(ResetPassworRequest $request){

        return $this->service->resetPassword($request->password, $request->reset_token);
      }

      /**
       * loged out
       */
      public function logout()
      {
          if(auth()->logout()){
            return response()->json([
                'status'=> 'success',
                'message' => 'Successfully logged out',
            ]);
        }else{
            return response()->json([
                'status'=> 'failed',
                'message' => 'Failed to log out',
            ]);
        }
      }
      /**
       * refresh token
       */
      public function refresh(RefreshRequest $request)
      {
            $token = $this->jwtService->refresh($request->token);
            $user = $this->jwtService->get_user($request->token);
            return $this->responseWithTokrn($token,$user);
      }
      public function user(){
        $user_id = request()->input('user_id');
        $user =  User::find($user_id);
        if(!$user){
            return response()->json([
                'status' => 'failed',
                'error' => 'User Not Found !'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
      }
}

