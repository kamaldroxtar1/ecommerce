<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JWTController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api'); 
       }

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'  => 'required|string',
            'l_name'   => 'required|string',
            'email'       => 'required|string|email',
            'password'    => 'required|string|min:8',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::insert([
                'name' => $request->name,
                'l_name'  => $request->l_name,
                'email'      => $request->email,
                'role_id'    => 5,
                'password'   => Hash::make($request->password),
            ]);
            // Mail::to($request->email)->send(new userRegister($request->all()));
            // Mail::to($request->email)->send(new adminRegister($request->all()));
            return response()->json([
                'message'=>'User create successfully',
                'user'=>$user
            ],201);
        }
    }

    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required|string|email',
            'password'=>'required|string|min:8'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            if(!$token=auth()->attempt($validator->validated())){
               return response()->json(['error'=>'Unauthorized'],401);
            }
            return $this->respondWithToken($token);
        }
    }

    public function logout(){
        auth()->logout();
        return response()->json(["message"=>"User Logout Successfully"]);
    }
    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60
        ]);
    }
    public function profile(){
        $arr=["admin","admin"];
        return response()->json($arr);
    }
  
}
