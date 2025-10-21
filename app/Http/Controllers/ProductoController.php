<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:productos,nombre',
            'descripcion' => 'required|string|max:255',
            'precio_venta' => 'required|integer|min:1',
            'precio_compra' => 'required|integer|min:1',
            'categoria' => 'required|string|max:100',
            'cantidad' => 'required|integer|min:1',
            'stock_minimo' => 'required|integer|min:1',
        ]);

        $cliente = Producto::create($validated);

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'cliente' => $cliente
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
