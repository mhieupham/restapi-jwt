<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function register(RegisterFormRequest $request){
        $user = $this->user->create([
            'email'=>$request->input('email'),
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password'))
        ]);
        return response()->json([
            'status'=>200,
            'message'=>'User created successfully',
            'data'=>$user
        ]);
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (!($token = \JWTAuth::attempt($credentials))) {
            return response()->json([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], Response::HTTP_BAD_REQUEST);
        }
        return response()->json(['token' => $token], Response::HTTP_OK);
    }
    public function getUserInfo(Request $request){
        $user = \Auth::user();
        if($user){
            return \response($user,Response::HTTP_OK);
        }
        return \response(null,Response::HTTP_BAD_REQUEST);
    }


}
