<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'office_address',
        'email',
        'phone',
        'whatsapp_number',
        'office_hours',
        'map_iframe_url',
        'site_logo',
        'site_favicon',
        'seo_title',
        'seo_description',
    ];
}
