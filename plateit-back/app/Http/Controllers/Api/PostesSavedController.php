<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Postes_saved;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Customs\Services\JwtTokenService;
use Illuminate\Support\Facades\DB;


class PostesSavedController extends Controller
{
    private $JwtService;
    public function __construct(){
        $this->JwtService = new JwtTokenService;
    }
    public function saved_post(Request $request){

        $token = request()->header('Authorization');
        $user = $this->JwtService->get_user($token)->id;

		$validator = Validator::make($request->all(), [
			'publication_id' => 'required',

		]);

		if($validator->fails()){
			return response()->json(['status' => 'failed', 'error' => $validator->errors() ]);
		}else{
            $check = Postes_saved::where('user_id', $user)->where('publication_id',$request->get('publication_id'));
            if($check->count() > 0){
             return response()->json(['status'=> 'failed', 'error' => 'post already saved' ]);
            }

				$Postes_saved = Postes_saved::create([
					'publication_id' => $request->get('publication_id'),
                    'user_id'=> $user,

				]);
				if($Postes_saved){
					return response()->json(['status' => 'success', 'message' => 'Postes saved successfully!']);
				}
			}
		}
        public function delete(){
            $id = request('id') ;
            $Postes_saved = Postes_saved::findOrFail($id);
            if($Postes_saved->delete()){
                return response()->json(['status' => 'success', 'message' => 'Postes_saved deleted successfully!' ]);
            }
        }

        public function get_saved_posts(){
            $key = request("key");
            $publications =  DB::table('publications as P')
            ->join('users as U', 'P.user_id', '=', 'U.id')
            ->join('postes_saved as PS', 'P.id', '=', 'PS.publication_id')
            ->where('U.fullName', 'like', '%' . $key . '%')
            ->orWhere('P.plate_name', 'like', '%' . $key . '%')
            ->orWhere('P.restaurant_Name', 'like', '%' . $key . '%')
            ->select('P.*', 'U.fullName as author', 'U.Points as author_points', 'U.id as author_id','U.ProfileImage','U.Points as author_points')
            ->orderBy('P.created_at', 'desc')
            ->get();
            return response()->json([
                'status'=> 'success',
                'data'=> $publications
            ],200);
        }

	}


