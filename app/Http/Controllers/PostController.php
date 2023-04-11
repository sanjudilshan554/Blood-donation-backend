<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
     public function store(Request $request){

        $validate_data=$request->validate([
            'user_id'=>[''],
            'title'=>[''],
            'Description'=>[''],
            'image'=>[''],
        ]);

        $data=post::create([
            'user_id'=>$validate_data['user_id'],
            'title'=>$validate_data['title'],
            'Description'=>$validate_data['Description'],
            'image'=>$validate_data['image'],
            
        ]);

        return response()->json(['data'=>$data,'status'=>'200','message'=>'post created']);
    }
}
