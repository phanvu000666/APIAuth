<?php

namespace App\Http\Controllers\APIUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function register(Request $request){
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password =Hash::make($request['password']);
        // $user->tokne();
        $user->save();

        return response()->json($user);
    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        
            $user = User::whereEmail($request->email)->first();
            $user->token = $user->createToken('App')->accessToken;
            return response()->json($user);
        }else{
            abort("sai len dang nhap hoac mat khau",403);
        }
    }
}