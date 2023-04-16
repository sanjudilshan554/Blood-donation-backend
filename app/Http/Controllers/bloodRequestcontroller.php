<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bloodRequest;
use App\Models\User;

class bloodRequestcontroller extends Controller
{
    public function bloodrequestsave(Request $request)
    {



        $validate_data = $request->validate([
            'Requester_id' => ['required'],
            'Request_get_id' => ['required'],
            'Requester_name' => ['required'],
            'Requester_mail' => ['required'],
            'Request_getter_name' => ['required'],
            'Request_getter_mail' => ['required'],
        ]);

        $data = bloodRequest::create([
            'Requester_id' => $validate_data['Requester_id'],
            'Request_get_id' => $validate_data['Request_get_id'],
            'Requester_name' => $validate_data['Requester_name'],
            'Requester_mail' => $validate_data['Requester_mail'],
            'Request_getter_name' => $validate_data['Request_getter_name'],
            'Request_getter_mail' => $validate_data['Request_getter_mail'],
        ]);

        return response()->json(['data' => $data, 'status' => '200', 'message' => 'request confirmed']);
    }

    public function requestFromOthers(Request $request)
    
    {
        
        
        $Request_getter_id=$request->userids;
        
        
        //select * from users u inner join bloodrequests b on u.id.=b.Requester_id where (Request_get_id==Request_getter_id)

        $requesterdetail=User::select('users.bloodtype','users.address','users.contactno','users.age','users.gender','blood_requests.Requester_name','blood_requests.Requester_mail','blood_requests.created_at')
                        ->join('blood_requests','users.id','=','blood_requests.Requester_id')
                        ->where('blood_requests.Request_get_id',$Request_getter_id)
                        ->get();

        return response()->json(['data'=>$requesterdetail,'status'=>'200']);
    }
}