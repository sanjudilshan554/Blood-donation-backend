<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
     public function store(Request $request){

        
        
        $validate_data=$request->validate([
            'userId'=>[''],
            'title'=>[''],
            'description'=>[''],
            'image'=>[''],
        ]);

        $data=post::create([
            'user_id'=>$validate_data['userId'],
            'title'=>$validate_data['title'],
            'Description'=>$validate_data['description'],
            'image'=>$validate_data['image'],
            
        ]);

        return response()->json(['data'=>$data,'status'=>'200','message'=>'post created successfully']);
    }

    public function view(){
        $getpost=post::get();

        if($getpost){
             return response()->json(['data'=>$getpost,'status'=>'200']);
        }
       else{
        return response()->json(['failed'=>'no data']);
       }
    }
}