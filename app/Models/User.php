<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $fillable = [
        'name',
        'nickname',
        'age',
        'email',
        'password',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Updated canAccessPanel method with the required parameter
    public function canAccessPanel(Panel $panel): bool
    {
        // Define the logic to determine if the user can access Filament
        return true;
    }

    public function skinAnalyses()
    {
        return $this->hasMany(SkinAnalysis::class);
    }
}
