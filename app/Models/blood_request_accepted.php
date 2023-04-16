<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blood_request_accepted extends Model
{
    use HasFactory;

    protected $fillable=[

        'Accepter_id',
        'Requester_id',
        'requestId',
        'requester_name',
        'requester_blood_type',
        'requester_address',
        'requester_contact',
        'requester_age',
        'requester_gender',
        'requester_requestmade',
        'Accepter_name',
        'Accepter_blood_type',
        'Accepter_address',
        'Accepter_contact',
        'Accepter_age',
        'Accepter_gender',
     
    ];
}