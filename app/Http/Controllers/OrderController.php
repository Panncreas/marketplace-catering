<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function show($id)
    {
        return Order::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menu_makanan,id',
            'quantity' => 'required|integer',
            'delivery_date' => 'required|date'
        ]);

        $menu = MenuMakanan::find($request->menu_id);
        $totalPrice = $menu->price * $request->quantity;

        return Order::create([
            'customer_id' => $request->customer_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'delivery_date' => $request->delivery_date,
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return $order;
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
