<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'expense_type_id',
        'amount',
        'status',
        'date_paid',
        'notes',
        'metadata'
    ];

    protected $casts = [
        'date_paid' => 'datetime',
        'metadata' => 'json'
    ];

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id', 'id');
    }
}
