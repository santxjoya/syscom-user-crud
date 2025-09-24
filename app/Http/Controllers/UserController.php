<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
    }}
