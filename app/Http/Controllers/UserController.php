<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'use_contract' => 'nullable'
        ]);

        $user = new User();
        $user->use_name = $request->use_name;
        $user->use_mail = $request->use_mail;
        $user->rol_id = $request->rol_id;
        $user->use_confirmation_date = $request->use_confirmation_date;

        if ($request->hasFile('use_contract')) {
            $path = $request->file('use_contract')->store('contracts', 'public');
            $user->use_contract = $path;
        }

    $user->save();

        return redirect()->route('users.create')->with('success', 'Usuario registrado correctamente.');
    }
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user);
        $request->validate([
            'use_name' => 'required|string|max:255',
            'use_mail' => 'required|email',
            'rol_id' => 'required|exists:roles,rol_id',
            'use_confirmation_date' => 'required|date',
        ]);

    $request->validate([
        'use_name' => 'required|string|max:255',
        'use_mail' => 'required|email|unique:users,use_mail,' . $user->use_id . ',use_id',
        'rol_id' => 'required|integer',
        'use_confirmation_date' => 'required|date',
        'use_contract' => 'nullable|mimes:pdf|max:2048',
    ]);

    $user->use_name = $request->use_name;
    $user->use_mail = $request->use_mail;
    $user->rol_id = $request->rol_id;
    $user->use_confirmation_date = $request->use_confirmation_date;

    if ($request->hasFile('use_contract')) {
        if ($user->use_contract) {
            Storage::disk('public')->delete($user->use_contract);
        }
        $path = $request->file('use_contract')->store('contracts', 'public');
        $user->use_contract = $path;
    }

    $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
