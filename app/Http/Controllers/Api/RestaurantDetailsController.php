<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantDetailsRequest;
use App\Models\Category;
use App\Models\Restaurant_details;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;
use Illuminate\Support\Facades\Validator;

class RestaurantDetailsController extends Controller
{

    public function insert_details(Request  $Request){

        $validator = Validator::make($Request->all(), [
            'address'=> ['string'],
            'phone_numbre'=> ['string'],
            'web_site'=> ['string'],
            'bio'=> ['string','max:250'],

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

             $ProfileImagePath = null;
            if ($Request->hasFile('ProfileImage')) {
                $ProfileImagePath = $Request->file('ProfileImage')->store('public/images/users');
                $ProfileImagePath = Storage::url($ProfileImagePath);
            }
            if (is_string($Request->get('ProfileImage'))) {
                $ProfileImagePath =$Request->get('ProfileImage');
            }
            $imageCoverPath = null;

            if ($Request->hasFile('image_cover')) {
                $imageCoverPath = $Request->file('image_cover')->store('public/images/users');
                $imageCoverUrl = Storage::url($imageCoverPath);
            }
            if (is_string($Request->get('image_cover'))) {
                $imageCoverUrl =$Request->get('image_cover');
            }

            $user = User::find($Request->user_id);
            $user->ProfileImage =$ProfileImagePath;
            $user->image_cover = $imageCoverUrl;
            $user->fullName = $Request->fullName;
            $user->bio = $Request->bio;
            $user->save();

            if($user->role  == 'restaurant'){
                $category_id =  $Request->category_id;
                if($Request->category_id === "undefined"){

                    $category_id = 1;
                }
                Restaurant_details::updateOrCreate(['restaurant_id' => $Request->restaurant_id], [
                    'category_id' => $category_id,
                    'address'=> $Request->address,
                    'phone_numbre'=> $Request->phone_numbre,
                    'web_site'=> $Request->web_site,
                ]);

                $category_name = Category::find($category_id)->name;
                return response()->json([
                    'status'=> 'success',
                    'message'=> 'Details Updated Successfully',
                    'category_id'=> $category_id,
                    'category_name'=> $category_name,
                    'ProfileImage'=> $ProfileImagePath,
                    'image_cover'=> $imageCoverUrl,
                    'fullName'=> $user->fullName,
                    'bio'=> $Request->bio,
                    'address'=> $Request->address,
                    'phone_numbre'=> $Request->phone_numbre,
                    'web_site'=> $Request->web_site,

                ],200);
            }else{
                return response()->json([
                    'status'=> 'success',
                    'message'=> 'Details Updated Successfully',
                    'ProfileImage'=> $ProfileImagePath,
                    'image_cover'=> $imageCoverUrl,
                    'fullName'=> $user->fullName,
                    'bio'=> $Request->bio,


                ],200);
            }

    }
        public function get_details(Request $Request){

           $restaurant_id = $Request->restaurant_id;
           $categories = Category::all();
           $restaurant_details = Restaurant_details::where('restaurant_id', $restaurant_id)->first();
           if( !$restaurant_details ){
            return response()->json([
                'status'=> 'failed',
                'error' => 'Details Not Found',
                'restaurant_id'=>$restaurant_id,
                'categories'=> $categories,
            ],403);
           }
           $category_id = $restaurant_details->category_id;
           $category = Category::find( $category_id )->name;
           $categories = Category::all();
           $restaurant_details->category = $category;

        //    $restaurant = User::find($restaurant_id);

           return response()->json([
            'status'=> 'success',
            'message'=> 'Details Selected Successfully',
            'categories'=> $categories,
            'restaurant_details'=>$restaurant_details
           ],200);
        }
}
