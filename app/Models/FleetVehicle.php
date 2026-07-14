<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FleetVehicle extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'badge',
        'capacity',
        'dimensions',
        'load_type',
        'gps_status',
        'image',
        'brochure',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(FleetCategory::class, 'category_id');
    }
}
