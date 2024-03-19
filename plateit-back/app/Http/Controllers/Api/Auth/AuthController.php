<?php

namespace App\Http\Controllers\Api\Auth;

use App\Customs\Services\EmailVerificationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResendEmailVerificationLinkRequest;
use App\Http\Requests\VerifyEmailRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendVerificationEmailQueueJob;
class AuthController extends Controller
{
    private $service;

    public function __construct(){
        $this->service = new EmailVerificationService;
    }

    /**
     * Login method
     */
    public function login(LoginRequest $request){
        $token = auth()->attempt($request->only("email","password"));
        if($token){
            return $this->responseWithTokrn($token,auth()->user());
        }else{
            return response()->json([
                'status' => 'failed',
                'error'  => 'Invalid credentials'
            ],401);
        }

    }

     /**
     * Register method
     */

    public function Register(RegisterRequest $request){

        $user = User::create([
            "fullName"  => $request->fullName,
            "email"     => $request->email,
            'password' => Hash::make($request->password),
            "role"      => $request->role
        ]);

        if($user){
            dispatch(new SendVerificationEmailQueueJob($user));
             $token = auth()->login($user);
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
     * Verify User Email
     *
     * When the user clicks the " verify Email" link in their email for resend the token ,
     * they should be redirected to the same  specific page in the frontend.
     * The email from the link need to be extracted and sent
     * to the 'auth/resend_email_verification_link' endpoint using a POST form.
     */

     public function resendEmailVerificationLink(ResendEmailVerificationLinkRequest $request){
        return $this->service->resendLink($request->email);
     }

}

