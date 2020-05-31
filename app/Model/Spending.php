<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $fillable = [
        'amount',
        'purpose',
        'comment'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
