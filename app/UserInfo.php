<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable = [
        'user_id', 'type', 'website', 'company_name', 'position', 'street', 'city', 'state', 'country',
        'post_code', 'total_spent'
    ];
}
