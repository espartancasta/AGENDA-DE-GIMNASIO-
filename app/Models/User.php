<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// 👉 OJO: ya NO usamos HasApiTokens aquí

class User extends Authenticatable
{
    use HasFactory, Notifiable; // 👉 quitamos HasApiTokens

    // Campos que se pueden llenar en masa
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts de atributos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
