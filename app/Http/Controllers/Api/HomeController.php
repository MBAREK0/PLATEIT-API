<?php

namespace App\Http\Controllers\Api;

use App\Customs\Services\JwtTokenService;
use App\Models\publications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\DailyRewardsJob;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $JwtService;
    public function __construct(){
        $this->JwtService = new JwtTokenService;
    }

    public function index(){

        $token = request()->header('Authorization');
        $user = (int) $this->JwtService->get_user($token)->id;
        dispatch(new DailyRewardsJob($user));
        
        $key = request("key");
        $type = request("type") ?? 'all';

        if($type == 'all'){
            $publications =  DB::table('publications as P')
            ->join('users as U', 'P.user_id', '=', 'U.id')
            ->where('U.fullName', 'like', '%' . $key . '%')
            ->orWhere('P.plate_name', 'like', '%' . $key . '%')
            ->orWhere('P.restaurant_Name', 'like', '%' . $key . '%')
            ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
            ->orderBy('P.created_at', 'desc')
            ->get();

        } else if($type == 'restaurant'){
            $publications = DB::table('publications as P')
            ->join('users as U', 'P.user_id', '=', 'U.id')
            ->where('U.role', 'restaurant')
            ->where(function ($query) use ($key) {
                $query->where('U.fullName', 'like', '%' . $key . '%')
                      ->orWhere('P.plate_name', 'like', '%' . $key . '%')
                      ->orWhere('P.restaurant_Name', 'like', '%' . $key . '%');
            })
            ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
            ->orderBy('P.created_at', 'desc')
            ->get();

        }else if($type == 'follow'){


        $publications = DB::table('publications as P')
            ->join('users as U', 'P.user_id', '=', 'U.id')
            ->join('follows as F', 'F.restaurant_id', '=', 'P.user_id')
            ->where('U.role', 'restaurant')
            ->where('F.user_id', $user)
            ->where(function ($query) use ($key) {
                $query->where('U.fullName', 'like', '%' . $key . '%')
                      ->orWhere('P.plate_name', 'like', '%' . $key . '%')
                      ->orWhere('P.restaurant_Name', 'like', '%' . $key . '%');
            })
            ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
            ->orderBy('P.created_at', 'desc')
            ->get();
        }


        if (empty($publications)){
            return response()->json([
                'status' => 'failed',
                'message'=> 'NO Result Found'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data'=> $publications
        ]);
        }


        public function profile_posts(){
            $profile_id = request("profile_id");

            $publications =  DB::table('publications as P')
            ->join('users as U', 'P.user_id', '=', 'U.id')
            ->where('U.id', '=' , $profile_id)
            ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
            ->orderBy('P.created_at', 'desc')
            ->get();


            if (empty($publications)){
                return response()->json([
                    'status' => 'failed',
                    'message'=> 'NO Result Found'
                ]);
            }
            return response()->json([
                'status' => 'success',
                'data'=> $publications
            ]);
        }

    }

