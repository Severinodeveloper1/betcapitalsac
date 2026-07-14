<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon_name',
        'cover_image',
        'cta_text',
        'cta_url',
        'brochure_file',
        'evidence_images',
        'sort_order',
    ];

    protected $casts = [
        'evidence_images' => 'array',
        'sort_order' => 'integer',
    ];
}
