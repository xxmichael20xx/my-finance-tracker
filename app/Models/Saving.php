<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = [
        'amount',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'json'
    ];
}
