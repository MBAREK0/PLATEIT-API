<?php

namespace App\Customs\Services;

use App\Models\EmailVerificationToken;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class EmailVerificationService
{

    /**
     * Send Verification link to user
     */

     public function sendVerificationLink($user){
        Notification::send($user, new EmailVerificationNotification($this->generateVerificationLink($user->email)));
     }

    /**
     * Generate Verification link
     */

     public function generateVerificationLink($email)
     {
        $checkIfTokenExists = EmailVerificationToken::where('email',$email)
                                                    ->first();
         if ($checkIfTokenExists)$checkIfTokenExists->delete();

         $token = Str::uuid();
         $url = config('app.url'). "?token=" . $token . "&email=" . $email ;
         $saveToken = EmailVerificationToken::create([
            "email"=> $email,
            "token"=> $token,
            "expired_at"=> now()->addMinutes(60)
         ]);
         if($saveToken) return $url;

     }
}
