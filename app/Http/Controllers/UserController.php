<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all()->sortByDesc('id');
        return view('users.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->date_admission = date($format = 'Y-m-d');
        $usuario->state = $request->state;
        $usuario->save();
        return redirect()->route('users.index')->with('mensaje', 'Datos guardados correctamente');
    }

    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('users.show', ['usuario' => $usuario]);
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('users.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        //$usuario->date_admission = date($format = 'Y-m-d');
        $usuario->state = $request->state;
        $usuario->save();
        return redirect()->route('users.show', $id)->with('mensaje', 'Datos actualizados correctamente');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('mensaje', 'Dato eliminado correctamente');
    }
}
