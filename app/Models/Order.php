<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'customer_id',     // Llave foránea que relaciona el pedido con el cliente
        'status_id',       // Llave foránea que indica el estado del pedido
        'total_price',     // Precio total del pedido
        'delivery_date',   // Fecha y hora de entrega del pedido
    ];

    /**
     * Relación con el modelo Customer.
     * Un pedido pertenece a un cliente.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relación con el modelo OrderStatus.
     * Un pedido tiene un estado asociado.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * Relación con los productos del pedido.
     * Un pedido puede tener muchos productos.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
