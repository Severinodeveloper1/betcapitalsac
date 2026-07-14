<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_cta_text',
        'hero_cta_url',
        'section_data',
    ];

    protected $casts = [
        'section_data' => 'array',
    ];
}
