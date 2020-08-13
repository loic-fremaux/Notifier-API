<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
        'name',
        'group_id',
        'user_id'
    ];
}
