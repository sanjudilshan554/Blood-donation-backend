<?php

namespace App\Http\Controllers;
use App\Models\blood_request_accepted;
use App\Models\bloodRequest;
use App\Models\User;
        

use Illuminate\Http\Request;

class blood_request_acceptedcontroller extends Controller
{
    public function requestAccepted(Request $request){
        
        $accepterId=$request->Accepter_id;
        $requester_name=$request->requester_name;
        $Request_getter_name=$request->Accepter_name;	
        $created_at=$request->requester_requestmade;
        
       $confermed=bloodRequest::where('Request_get_id',$accepterId)
       ->where('Requester_name',$requester_name)
       ->where('Request_getter_name',$Request_getter_name)
       ->where('created_at',$created_at)->first();


        $Request_id=$confermed->id;
        $Requester_id=$confermed->Requester_id ;
        // return  $confermed;
        // return $request;
        
        $validate_data=$request->validate([
        'Accepter_id'=>['required'],
        'requester_name'=>['required'],
        'requester_blood_type'=>['required'],
        'requester_address'=>['required'],
        'requester_contact'=>['required'],
        'requester_age'=>['required'],
        'requester_gender'=>['required'],
        'requester_requestmade'=>['required'],
        'Accepter_name'=>['required'],
        'Accepter_blood_type'=>['required'],
        'Accepter_address'=>['required'],
        'Accepter_contact'=>['required'],
        'Accepter_age'=>['required'],
        'Accepter_gender'=>['required'],
        ]);

        

        $data=blood_request_accepted::create([
        'Accepter_id'=>$validate_data['Accepter_id'],
        'Requester_id'=>$Requester_id,
        'requestId'=>$Request_id,
        'requester_name'=>$validate_data['requester_name'],
        'requester_blood_type'=>$validate_data['requester_blood_type'],
        'requester_address'=>$validate_data['requester_address'],
        'requester_contact'=>$validate_data['requester_contact'],
        'requester_age'=>$validate_data['requester_age'],
        'requester_gender'=>$validate_data['requester_gender'],
        'requester_requestmade'=>$validate_data['requester_requestmade'],
        'Accepter_name'=>$validate_data['Accepter_name'],
        'Accepter_blood_type'=>$validate_data['Accepter_blood_type'],
        'Accepter_address'=>$validate_data['Accepter_address'],
        'Accepter_contact'=>$validate_data['Accepter_contact'],
        'Accepter_age'=>$validate_data['Accepter_age'],
        'Accepter_gender'=>$validate_data['Accepter_gender'],
        ]);
        
      
        //Deleting entier row  //You can see those deleted things in acceptecd part
        // bloodRequest::where('id',$Request_id)
        // ->where('Requester_id',$Requester_id)->delete();
        
        // return $data;
     return response()->json(['data'=>$data,'status'=>'200','message'=>'Confirm Successfully']);
        
    }

    public function accepted(Request $request){

        
        $currentLocalhostId=$request->currentLocalId;
        
        $details=User::select('users.email','blood_request_accepteds.Accepter_name','blood_request_accepteds.Accepter_blood_type','blood_request_accepteds.Accepter_address','blood_request_accepteds.Accepter_contact','blood_request_accepteds.Accepter_age','blood_request_accepteds.Accepter_gender','blood_request_accepteds.created_at')
        ->join('blood_request_accepteds','users.id','=','blood_request_accepteds.Accepter_id')
        ->where('blood_request_accepteds.Requester_id',$currentLocalhostId)
        ->get();
    
        
        return response()->json(['data'=>$details,'status'=>'200','message'=>'data getting successfully']);
        
    }

    public function acceptedforhome(Request $request){
      
        $currentLocalhostId=$request->localid;

        $count=blood_request_accepted::where('blood_request_accepteds.Requester_id',$currentLocalhostId)
        ->get()->count();

        $count2=bloodRequest::where('blood_requests.Request_get_id',$currentLocalhostId)
        ->get()->count();

        $count3=bloodRequest::where('blood_requests.Requester_id',$currentLocalhostId)
        ->get()->count();
        
        
        return response()->json(['data'=>$count,'status'=>'200','data2'=>$count2,'data3'=>$count3]);
    }

    
}