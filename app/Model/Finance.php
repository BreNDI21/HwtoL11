<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'my_balance'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
