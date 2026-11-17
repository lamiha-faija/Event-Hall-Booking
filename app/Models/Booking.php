<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'hall_id',
        'event_date',
        'booking_type',
        'start_time',
        'end_time',
        'event_type',
        'guests',
        'status'
    ];

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

        public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
