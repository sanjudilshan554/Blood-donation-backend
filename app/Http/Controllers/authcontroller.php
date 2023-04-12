<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class authcontroller extends Controller
{
    public function store(Request $request){
        $email=$request->email;
        $password=$request->password;

        $userAuth=User::where('email',$email)->where('password',$password)->first();

        if($userAuth){
            if( $userAuth->email === $email || $userAuth->password ===  $password){
                return response()->json(['data'=>$userAuth, 'message'=>'User login successfully','status'=>'200']);
            }
        }
        else{
            return response()->json(['message'=>'incorrect email or password','status'=>'500']);
        }
    }
}