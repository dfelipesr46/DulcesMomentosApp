<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'category_id',   // Llave foránea que relaciona el producto con su categoría
        'name',          // Nombre del producto
        'description',   // Descripción del producto
        'price',         // Precio del producto
    ];

    /**
     * Relación con la tabla Category.
     * Un producto pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('quantity', 'subtotal')
            ->withTimestamps();
    }
}
