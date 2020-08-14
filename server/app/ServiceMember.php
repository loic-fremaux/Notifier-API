<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceMember extends Model
{
    protected $fillable = [
        'id', 'service_id', 'user_id',
    ];
}
