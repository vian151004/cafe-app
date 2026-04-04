<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    public function getRedirectRoute()
    {
        // Cek role menggunakan Spatie
        if ($this->hasRole('admin')) {
            return '/admin';
        }
        
        if ($this->hasRole('kasir')) {
            return '/kasir';
        }

        return '/'; // Default untuk pelanggan/guest
    }
    
    /**
     * Penyesuaian untuk Sistem Cafe:
     * Relasi ke tabel Shift (untuk audit kasir)
     */
    public function shifts() 
    {
        return $this->hasMany(Shift::class);
    }

    /**
     * Penyesuaian untuk Sistem Cafe:
     * Relasi ke tabel Order (transaksi yang ditangani user ini)
     */
    public function orders() 
    {
        return $this->hasMany(Order::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->hasRole('admin'); 
        }

        if ($panel->getId() === 'kasir') {
            return $this->hasRole('admin') || $this->hasRole('kasir');
        }

        return false;
    }
}
