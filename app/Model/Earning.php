<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $fillable = [
        'amount',
        'source',
        'comment'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
