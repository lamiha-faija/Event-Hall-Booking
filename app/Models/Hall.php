<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hall extends Model
{
    protected $fillable = [
        'name',
        'location',
        'capacity',
        'price',
        'description',
        'image'
    ];
    public function bookings(): HasMany
    {
    return $this->hasMany(Booking::class);
    }
}