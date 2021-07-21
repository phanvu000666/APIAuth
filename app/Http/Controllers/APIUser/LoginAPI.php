<?php

namespace App\Http\Controllers\APIUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //show form login
    public function getLogin(){
        return view('Auth/login');
    }

    //method login
    public function postLogin(Request $request){
        
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return view('/home');
          
        }else{
            return redirect()->back();
        }
    }
}