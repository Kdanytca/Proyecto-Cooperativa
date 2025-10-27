<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // Mostrar solo usuarios que sean clientes
        $clients = User::where('tipo_usuario', 'cliente')->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'tipo_usuario' => 'cliente', // 🔑 se fuerza a cliente
        ]);

        return redirect()->route('administrador.clients.index')
            ->with('success', 'Cliente creado correctamente');
    }

    public function edit(User $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $client->id,
            'trabajo' => 'nullable|string|max:255',
            'salario' => 'nullable|numeric|min:0',
            'telefono' => 'nullable|string|max:20',
            'tiene_reporte' => 'nullable|boolean',
            'mora' => 'nullable|integer|min:0',
        ]);

        // 🔹 Actualizar datos básicos del usuario
        $client->update($request->only('name', 'email'));

        // 🔹 Si hay contraseña nueva
        if ($request->filled('password')) {
            $client->update(['password' => bcrypt($request->password)]);
        }

        // 🔹 Crear o actualizar el perfil crediticio asociado al cliente
        $client->perfilCrediticio()->updateOrCreate(
            ['user_id' => $client->id],
            [
                'trabajo' => $request->trabajo,
                'salario' => $request->salario,
                'telefono' => $request->telefono,
                'tiene_reporte' => $request->tiene_reporte ?? false,
                'mora' => $request->mora,
            ]
        );

        return redirect()->route('administrador.clients.index')
            ->with('success', 'Cliente actualizado correctamente');
    }



    public function destroy(User $client)
    {
        if (Auth::user()->tipo_usuario === 'empleado') {
            abort(403, 'No tienes permiso para eliminar clientes.');
        }

        $client->delete();

        return back()->with('success', 'Cliente eliminado correctamente');
    }
}
