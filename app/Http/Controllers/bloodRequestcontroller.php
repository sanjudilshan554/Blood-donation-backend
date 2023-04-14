<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bloodRequest;

class bloodRequestcontroller extends Controller
{
    public function bloodrequestsave(Request $request){
    
       
        
        $validate_data=$request->validate([
            'Requester_id'=>['required'],
            'Request_get_id'=>['required'],
            'Requester_name'=>['required'],
            'Requester_mail'=>['required'],
            'Request_getter_name'=>['required'],
            'Request_getter_mail'=>['required'],
        ]);

        $data=bloodRequest::create([
            'Requester_id'=>$validate_data['Requester_id'],
            'Request_get_id'=>$validate_data['Request_get_id'],
            'Requester_name'=>$validate_data['Requester_name'],
            'Requester_mail'=>$validate_data['Requester_mail'],
            'Request_getter_name'=>$validate_data['Request_getter_name'],
            'Request_getter_mail'=>$validate_data['Request_getter_mail'],
        ]);
        
        return response()->json(['data'=>$data,'status'=>'200','message'=>'request confirmed']);
    }
}