<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar en masa.
     */
    protected $fillable = [
        'name',
        'price',
        'duration_days',
        'is_active',
    ];

    /**
     * Casts para tipos de datos.
     */
    protected $casts = [
        'is_active'     => 'boolean',
        'price'         => 'decimal:2',
        'duration_days' => 'integer',
    ];

    /**
     * 👉 Relación: una membresía tiene muchos usuarios (clientes)
     */
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
