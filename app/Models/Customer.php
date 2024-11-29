<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Definir la tabla asociada (si no es el plural del nombre del modelo)
    protected $table = 'customers';

    // Especificar los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'phone',
        'preferences'
    ];

    // Definir las relaciones, si las hay (por ejemplo, con los pedidos)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
