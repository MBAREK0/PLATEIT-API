<?php

namespace App\Http\Controllers\Api;

use App\Customs\Services\JwtTokenService;
use App\Models\publications;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Jobs\SystemOfPointsJob;
use App\Models\No_users_restaurants;
use App\Models\Restaurant_details;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{


    private $JwtService;

    public function __construct(){
        $this->JwtService = new JwtTokenService;

    }

	public function save_post(Request $request){

        $token = $request->header('Authorization');
        $user = $this->JwtService->get_user($token);

        if(empty($request->description) && empty($request->image)) {
            return response()->json(['error' => 'the post should not be empty !'], 422);
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images/posts');
            $imageUrl = Storage::url($imagePath);
        }

       else if (is_string($request->get('image'))) {
                $imageUrl =$request->get('image');
        }
      else{
            $imageUrl =$imagePath;
        }


        if(!empty($request->restaurant_id)){
            $restaurant_Name = User::where('id',request()->get('restaurant_id'))->first()->fullName ?? null ;
            $restaurant_link = Restaurant_details::where('restaurant_id',$request->restaurant_id)->first()->web_site ?? null;
  
        }else{


            $restaurant = $this->add_restaurants($request->get('restaurant_Name'),$request->get('restaurant_link'));
            if($restaurant){
                $restaurant_Name = $request->get('restaurant_Name');
                $restaurant_link = $request->get('restaurant_link');
            }
        }

			if(!empty($request->id)){
				$Post = publications::where('id', $request->id)->update([
					'plate_name' => $request->plate_name,
					'restaurant_Name' => $restaurant_Name,
					'image' => $imageUrl,
					'description' => $request->get('description'),
					'restaurant_link' => $restaurant_link,
					'restaurant_id' => $request->restaurant_id,
                    'user_id' => $user->id,
				]);
				if($Post){
					return response()->json(['status' => 'success', 'message' => 'Post updated successfully!']);
				} else{
                    return response()->json(['status' => 'faild', 'error' => 'error when updated the Post ']);
                }
			}else{

				$Post = publications::create([
					'plate_name' => $request->plate_name,
					'restaurant_Name' => $restaurant_Name,
					'image' => $imageUrl,
					'description' => $request->get('description'),
					'restaurant_link' => $restaurant_link,
					'restaurant_id' => $request->restaurant_id,
                    'user_id' => $user->id,
				]);
				if($Post){
                    dispatch(new SystemOfPointsJob($user->id,'AddPostPoints'))->add_points();
                    $publications =  DB::table('publications as P')
                    ->join('users as U', 'P.user_id', '=', 'U.id')
                    ->where('P.id', $Post->id)
                    ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
                    ->first();
                    return response()->json(['status' => 'success', 'message' => 'Post saved successfully!', 'post' => $publications]);
				}else{
                    return response()->json(['status' => 'faild', 'error' => 'error when saved the Post ']);
                }
			}
		}
        public function add_restaurants($fullName,$web_site){
            $restaurant = No_users_restaurants::create([
                'fullName' => $fullName,
                'web_site' => $web_site
            ]);
            if(!$restaurant){
                return response()->json([
                    'status' => 'failed',
                    'message'=> 'Failed to add restaurant'
                ]);
            }
            return $restaurant;
        }
        public function get_all_restaurants(){

            $restaurants = DB::table('users')
            ->where('role', 'restaurant')
            ->select( 'users.fullName', 'users.Points','users.id as restaurant_id', 'restaurant_details.web_site')
            ->leftJoin('restaurant_details', 'users.id', '=', 'restaurant_details.restaurant_id')
            ->get();

            if (empty($restaurants)){
                return response()->json([
                    'status' => 'failed',
                    'message'=> 'NO Result Found'
                ]);
            }
            return response()->json([
                'status' => 'success',
                'restaurants'=> $restaurants
            ]);
        }

	public function delete( $PostID = '')
    {
        $token = request()->header('Authorization');
        $user = $this->JwtService->get_user($token);
        $id = request()->get('id');
        if($PostID){
            $id= $PostID;
        }
		$Post = publications::findOrFail($id);
		if($Post->delete()){
            dispatch(new SystemOfPointsJob($user->id,'AddPostPoints'))->remove_points();

			return response()->json(['status' => 'success', 'message' => 'Post deleted successfully!' ]);
		}
	}




}
