<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'name', // Nombre del estado del pedido
    ];

    /**
     * Relación con la tabla Order.
     * Un estado puede estar asociado a muchos pedidos.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
