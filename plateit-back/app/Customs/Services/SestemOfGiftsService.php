<?php

namespace App\Customs\Services;

use App\Jobs\SendTeckitJob;
use App\Mail\GiftsMail;
use App\Models\Claim_gifts;
use App\Models\Gifts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class SestemOfGiftsService
{
    public function index($user,$gift_id){
        $gift = Gifts::find($gift_id);
        if($gift){
            $user_point = (float)$user->Points;
            $gift_cost_points = (float)$gift->PointsCost;


            if($user_point >= $gift_cost_points){
               return  $this->sendTeckit($user, $gift);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'error' => 'Your accumulated points are less than the required points for this gift.'
                ]);

            }
        }
    }
    public function sendTeckit($user, $gift){


       $randomNumber = mt_rand(100000000, 999999999);

       $claim= Claim_gifts::create([
            'user_id'=> $user->id,
            'gift_id'=> $gift->id,
            'random_id'=> $randomNumber,
            'status'=> 1,
        ]);
        if( $claim ){

        $user->Points = (float)$user->Points - (float)$gift->PointsCost;
        $user->save();

        $data['name']= $user->fullName;
        $data['email']= $user->email;
        $data['Ticket']= $gift->image;
        $data['date']= now();
        $data['Ticket_id']= $randomNumber;

        $job = dispatch(new SendTeckitJob($data));
        if ($job) {
            return response()->json([
                'status' => 'success',
                'messge' => 'Gift Scheduled for Sending please check your email after minuts.'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'error' => 'Failed to schedule the gift for sending please check your email after 24 hours.'
            ]);
        }

        }else{
            return response()->json([
                'status'=> 'failed',
                'error'=> 'error when tring to  Claim the gift please try again later.'
            ]);
        }
    }
    public function get_gifts(){
        $gifts = Gifts::all();
        return response()->json([
            'status'=> 'success',
            'data'=> $gifts
        ]);
    }
}
