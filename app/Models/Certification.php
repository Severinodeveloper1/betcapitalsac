<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'validity',
        'description',
        'image',
        'pdf_file',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
