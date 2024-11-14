<?php

namespace App\Http\Controllers;

use App\Models\MenuMakanan;
use Illuminate\Http\Request;

class MenuMakananController extends Controller
{
    public function index()
    {
        return MenuMakanan::all();
    }

    public function show($id)
    {
        return MenuMakanan::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);

        return MenuMakanan::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $menu = MenuMakanan::findOrFail($id);
        $menu->update($request->all());
        return $menu;
    }

    public function destroy($id)
    {
        MenuMakanan::destroy($id);
        return response()->json(['message' => 'Menu deleted successfully']);
    }
}
