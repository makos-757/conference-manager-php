<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function isStaff(): bool
    {
        return in_array($this->role, ['admin', 'organiser'], true);
    }

    public function conferences(): HasMany
    {
        return $this->hasMany(Conference::class, 'organiser_id');
    }

    public function conferenceRegistrations(): HasMany
    {
        return $this->hasMany(ConferenceRegistration::class);
    }

    public function sessionRegistrations(): HasMany
    {
        return $this->hasMany(SessionRegistration::class);
    }
}