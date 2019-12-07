<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'file_id', 'user_id', 'name_on_card', 'cost'
    ];
}
