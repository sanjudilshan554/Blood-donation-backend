<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloodRequest extends Model
{
    use HasFactory;

    protected $fillable=[
        
            'Requester_id',
            'Request_get_id',
            'Requester_name',
            'Requester_mail',
            'Request_getter_name',
            'Request_getter_mail',
        
    ];
}