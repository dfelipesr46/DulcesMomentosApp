<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        // Inicializa la consulta base
        $query = Order::with(['customer', 'status']);

        // Aplica filtros si existen en la solicitud
        if ($request->has('customer') && $request->customer != '') {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->customer . '%');
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->whereHas('status', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->status . '%');
            });
        }

        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('delivery_date', [$request->from_date, $request->to_date]);
        }

        // Paginación
        $orders = $query->paginate(10);

        // Devuelve la vista del dashboard con los pedidos
        return view('dashboard', compact('orders'));
    }

    
}
