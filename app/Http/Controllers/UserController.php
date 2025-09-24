<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
    $users = User::with('rol')->get();
    $roles = Rol::all();
    return view('users.index', compact('users', 'roles'));
}

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'use_name' => 'required|string|max:255',
            'use_mail' => 'required|email',
            'rol_id' => 'required',
            'use_confirmation_date' => 'required|date',
        ]);

        User::create([
            'use_name' => $request->use_name,
            'use_mail' => $request->use_mail,
            'rol_id' => $request->rol_id,
            'use_confirmation_date' => $request->use_confirmation_date,
        ]);

        return redirect()->route('users.create')->with('success', 'Usuario registrado correctamente.');
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'use_name' => 'required|string|max:255',
            'use_mail' => 'required|email',
            'rol_id' => 'required|exists:roles,rol_id',
            'use_confirmation_date' => 'required|date',
        ]);

        $user->update([
            'use_name' => $request->use_name,
            'use_mail' => $request->use_mail,
            'rol_id' => $request->rol_id,
            'use_confirmation_date' => $request->use_confirmation_date,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
