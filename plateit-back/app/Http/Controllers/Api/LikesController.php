<?php

namespace App\Http\Controllers\Api;

use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Customs\Services\JwtTokenService;

class LikesController extends Controller
{

    private $JwtService;
    public function __construct(){
        $this->JwtService = new JwtTokenService;
    }

	public function save_like(Request $request){

        $token = request()->header('Authorization');
        $user = $this->JwtService->get_user($token)->id;

		$validator = Validator::make($request->all(), [
			'publication_id' => 'required',
			'type' => 'required',
		]);

		if($validator->fails()){
			return response()->json(['status' => 'failed', 'error' => $validator->errors() ]);
		}else{
			if(!empty($request->id)){
				$likes = Likes::where('id', $request->id)->update([
					'publication_id' => $request->get('publication_id'),
					'type' => $request->get('type'),
                    'user_id'=> $user,
				]);
				if($likes){
					return response()->json(['status' => 'success', 'message' => 'likes updated successfully!']);
				}
			}else{
				$likes = Likes::create([
					'publication_id' => $request->get('publication_id'),
					'type' => $request->get('type'),
                    'user_id'=> $user,
				]);
				if($likes){
					return response()->json(['status' => 'success', 'message' => 'likes saved successfully!']);
				}
			}
		}
	}

	public function delete(){
        $id = request('id') ;
		$like = Likes::findOrFail($id);
		if($like->delete()){
			return response()->json(['status' => 'success', 'message' => 'like deleted successfully!' ]);
		}
	}
}
