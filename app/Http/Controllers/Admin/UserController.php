<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('tipo_usuario', ['administrador', 'empleado'])->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->tipo_usuario === 'empleado') {
            $tipos = ['empleado', 'cliente'];
        } else {
            // Admin puede ver todos
            $tipos = ['administrador', 'empleado', 'cliente'];
        }

        return view('admin.users.create', compact('tipos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'tipo_usuario' => 'required|in:administrador,empleado,cliente',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Si el usuario autenticado es EMPLEADO y quiere crear un ADMIN, bloquear
        if (Auth::user()->tipo_usuario === 'empleado' && $request->tipo_usuario === 'administrador') {
            abort(403, 'No tienes permiso para crear administradores.');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('administrador.users.index')
            ->with('success', '✅ Usuario creado correctamente');
    }


    public function edit(User $user)
    {
        if (Auth::user()->tipo_usuario === 'empleado' && $user->tipo_usuario === 'administrador') {
            return redirect()->route('administrador.users.index')
                ->with('error', '⚠️ No tienes permiso para acceder a esta página.');
        }

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        // Si el usuario autenticado es empleado y el usuario a modificar es administrador → Prohibido
        if (Auth::user()->tipo_usuario === 'empleado' && $user->tipo_usuario === 'administrador') {
            return redirect()->route('administrador.users.index')
                ->with('error', '⚠️ No tienes permiso para editar administradores.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'tipo_usuario' => 'required|in:administrador,empleado,cliente',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Si es empleado, no puede cambiar el tipo a administrador
        if (Auth::user()->tipo_usuario === 'empleado' && $request->tipo_usuario === 'administrador') {
            return back()->with('error', '⚠️ No puedes asignar el rol de administrador.');
        }

        $data = $request->only(['name', 'email', 'tipo_usuario']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('administrador.users.index')
            ->with('success', '✏️ Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        // Evitar que alguien se elimine a sí mismo
        if (Auth::user()->id === $user->id) {
            return redirect()->route('administrador.users.index')
                ->with('error', '⚠️ No puedes eliminar tu propio usuario.');
        }

        // Evitar que un empleado elimine administradores (si ya lo tienes)
        if (Auth::user()->tipo_usuario === 'empleado' && $user->tipo_usuario === 'administrador') {
            return redirect()->route('administrador.users.index')
                ->with('error', '⚠️ No tienes permiso para eliminar administradores.');
        }

        $user->delete();

        return redirect()->route('administrador.users.index')
            ->with('success', '🗑️ Usuario eliminado correctamente');
    }
}
