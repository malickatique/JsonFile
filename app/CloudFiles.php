<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloudFiles extends Model
{
    //
    protected $fillable = [
         'file_name', 'status', 'path', 'user_id', 'file_size', 'price'
    ];
}
