<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'claim_number',
        'fullname',
        'document_type',
        'document_number',
        'address',
        'department',
        'province',
        'district',
        'phone',
        'email',
        'parent_name',
        'item_type',
        'item_description',
        'item_amount',
        'claim_type',
        'claim_details',
        'consumer_request',
        'status',
        'provider_response',
        'response_date',
    ];

    protected $casts = [
        'item_amount' => 'decimal:2',
        'response_date' => 'date',
    ];
}
