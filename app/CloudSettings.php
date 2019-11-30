<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CloudSettings extends Model
{
    //
    protected $fillable = [
        'disk_name', 'token', 'folder'
    ];
}
