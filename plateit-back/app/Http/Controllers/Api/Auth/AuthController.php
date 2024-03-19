<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendVerificationEmailQueueJob;
class AuthController extends Controller
{

    public function __construct(){}
    
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
}

