<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverApplication extends Model
{
    protected $fillable = [
        'driver_name',
        'phone',
        'vehicle_type',
        'vehicle_plate',
        'license_number',
        'vehicle_year',
        'status',
        'notes',
    ];
}
