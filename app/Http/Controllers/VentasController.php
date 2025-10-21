<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    // Mostrar todas las ventas
    public function index()
    {
        $ventas = Ventas::all();
        return response()->json($ventas);
    }

    // Crear una nueva venta
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'nullable|integer|exists:clientes,cliente_id',
            'usuario_id' => 'nullable|integer|exists:usuarios,usuario_id',
            'total' => 'required|numeric',
            'estado' => 'required|string|max:10',
            'fecha' => 'nullable|date',
        ]);

        $venta = Ventas::create($request->all());
        return response()->json(['message' => 'Venta creada correctamente', 'venta' => $venta], 201);
    }

    // Mostrar una venta específica
    public function show($id)
    {
        $venta = Ventas::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta);
    }

    // Actualizar una venta
    public function update(Request $request, $id)
    {
        $venta = Ventas::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $request->validate([
            'cliente_id' => 'nullable|integer|exists:clientes,cliente_id',
            'usuario_id' => 'nullable|integer|exists:usuarios,usuario_id',
            'total' => 'sometimes|numeric',
            'estado' => 'sometimes|string|max:10',
            'fecha' => 'sometimes|date',
        ]);

        $venta->update($request->all());
        return response()->json(['message' => 'Venta actualizada correctamente', 'venta' => $venta]);
    }

    // Eliminar una venta
    public function destroy($id)
    {
        $venta = Ventas::find($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(['message' => 'Venta eliminada correctamente']);
    }
}
