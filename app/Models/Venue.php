<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    protected $fillable = ['name', 'address', 'capacity'];

    protected $casts = [
        'capacity' => 'integer',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(ConferenceSession::class);
    }
}