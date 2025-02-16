<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'remarks',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'json'
    ];
}
