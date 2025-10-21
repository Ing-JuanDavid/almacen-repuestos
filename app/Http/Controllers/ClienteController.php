<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
   
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    // GET /api/clientes/{id} → ver un cliente específico
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente);
    }

    // POST /api/clientes → crear nuevo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|integer|min:1|unique:clientes,cliente_id',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $cliente = Cliente::create($validated);

        return response()->json([
            'message' => 'Cliente creado exitosamente',
            'cliente' => $cliente
        ], 201);
    }

    // PUT /api/clientes/{id} → actualizar cliente existente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        $cliente->update($validated);

        return response()->json([
            'message' => 'Cliente actualizado correctamente',
            'cliente' => $cliente
        ]);
    }

    // DELETE /api/clientes/{id} → eliminar cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente eliminado correctamente']);
    }
}
