<?php

namespace App\Http\Controllers\Api;


use App\Customs\Services\JwtTokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlateRequest;
use App\Models\restaurant_menu;
use App\Models\restaurant_plate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class MenuController extends Controller
{


    private $JwtService;
    public function __construct(){
        $this->JwtService = new JwtTokenService;
    }

	public function menu(){
        $user_id = request()->get('user_id');

		$menu =  restaurant_plate::query()
        ->join('restaurant_menu', 'restaurant_plates.id', '=', 'restaurant_menu.plate_id')
        ->join('users', 'restaurant_menu.restaurant_id', '=', 'users.id')
        ->select('restaurant_plates.*')
        ->where('users.id', $user_id)
        ->get();

        return response()->json(['status' => 'success', 'data' => $menu ]);
	}

	public function save_plate(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'description' => ['required','string'],
            'price' => ['required','numeric'],
            'image' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images/plates');
                $imageUrl = Storage::url($imagePath);
            }
            if (is_string($request->get('image'))) {
                $imageUrl ='/storage/images/plates/' . basename($request->get('image'));
            }


			if(!empty($request->id)){

				$plate = restaurant_plate::where('id', $request->id)->update([
					'name' => $request->name,
					'description' => $request->description,
					'price' => $request->price,
					'image' =>  $imageUrl
				]);
				if($plate){
                    $plate = restaurant_plate::findOrFail($request->id);
					return response()->json(['status' => 'success', 'message' => 'plate updated successfully!' ,'plate' => $plate]);
				}
			}else{
                $token = $request->header('Authorization');
                $user = $this->JwtService->get_user($token);
				$plate = restaurant_plate::create([
					'name' => $request->get('name'),
					'description' => $request->get('description'),
					'price' => $request->get('price'),
					'image' => $imageUrl,
				]);
				if($plate){

                    $check = restaurant_menu::where('plate_id', $plate->id)->where('restaurant_id',$user->id);
                    if($check->count() > 0){
                     return response()->json(['status'=> 'failed', 'error' => 'plate already exist in this menu' ]);
                    }
                    $add_to_menu = restaurant_menu::create([
                        'plate_id'=> $plate->id,
                        'restaurant_id'=> $user->id,
                    ]);
                    if($add_to_menu){
                        return response()->json(['status' => 'success', 'message' => 'plate saved successfully!', 'plate' => $plate]);
                    }else{
                        $this->delete($plate->id);
                        return response()->json(['status' => 'faild', 'error' => 'error when saved the restaurant and plate in the menu']);
                    }
				}else{
                    return response()->json(['status' => 'faild', 'error' => 'error when saved the plate ']);
                }
			}
		}

	public function get_plate(){
        $id = request()->get('id');
		$plate = restaurant_plate::findOrFail($id);
		return response()->json(['status' => 'success', 'data' => $plate ]);
	}

	public function delete( $plateID = '')
    {
        $id = request()->get('id');
        if($plateID){
            $id= $plateID;
        }
		$plate = restaurant_plate::findOrFail($id);
		if($plate->delete()){
			return response()->json(['status' => 'success', 'message' => 'plate deleted successfully!', 'id' => $plate->id ]);
		}
	}

    public function delete_menu(){
        $token = request()->header('Authorization');
        $user = $this->JwtService->get_user($token)->id;

		$ides =  restaurant_plate::query()
        ->join('restaurant_menu', 'restaurant_plates.id', '=', 'restaurant_menu.plate_id')
        ->join('users', 'restaurant_menu.restaurant_id', '=', 'users.id')
        ->select('restaurant_plates.id')
        ->where('users.id', $user)
        ->get();

        foreach($ides as $id){
            $this->delete($id->id);
        }

        return response()->json(['status' => 'success', 'message' => 'menu deleted successfully' ]);
	}

}
