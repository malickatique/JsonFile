<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    //
    protected $fillable = [
        'slug', 'h1', 'h2', 'p', 'img', 'url',
    ];
}
