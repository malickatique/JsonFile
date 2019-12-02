<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    //
    protected $fillable = [
        'site_name', 'site_logo', 'site_logo_text', 'site_header_text', 'site_header_pic', 'site_about_us', 'site_address', 
        'site_location', 'site_facebook', 'site_phone', 'site_email', 'site_instagram', 'site_twitter', 'site_linkedin',
    ];
}
