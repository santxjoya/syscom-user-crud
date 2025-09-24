<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rol_name' => 'required|string|max:100',
        ]);

        Rol::create([
            'rol_name' => $request->rol_name,
        ]);
    }
}
