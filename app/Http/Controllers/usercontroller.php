<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function store(Request $request)
    {

        $validate_data = $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'bloodtype' => ['required'],
            'alreadydonated' => ['required'],
            'disies' => ['required'],
            'postalcode' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'province' => ['required'],
            'height' => ['required'], 
            'weight' => ['required'], //to be fixed
            'address' => ['required'],
            'contactno' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $data = User::create([
            'fname'=> $validate_data['fname'],
            'lname' => $validate_data['lname'],
            'age' => $validate_data['age'],
            'gender' => $validate_data['gender'],
            'bloodtype' => $validate_data['bloodtype'],
            'alreadydonated' => $validate_data['alreadydonated'],
            'disies' => $validate_data['disies'],
            'postalcode' => $validate_data['postalcode'],
            'city' => $validate_data['city'], 
            'district' => $validate_data['district'],
            'province' => $validate_data['province'],
            'height' => $validate_data['height'],
            'width' => $validate_data['weight'],
            'address' => $validate_data['address'],
            'contactno' => $validate_data['contactno'],
            'email' => $validate_data['email'],
            'password' => $validate_data['password'],
        ]);

        return response()->json(['data'=>$data,'message'=>'recode saved','status'=>'200']);
    }

    public function bloodrequest(){
        $data=User::get();
        if($data){
            return response()->json(['user_data'=>$data,'status'=>'200']);
        }
        else{
            return response()->json(['faild'=>'no data']);
        }
    }
    
}