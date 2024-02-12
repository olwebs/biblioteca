<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;


class EditorialController extends Controller
{
    public function index()
    {
        $editoriales = Editorial::all()->sortByDesc('id');
        return view('editorials.index', ['editoriales' => $editoriales]);
    }
    public function create()
    {
        return view('editorials.create');
    }
    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('editorials.edit', ['editorial' => $editorial]);
    }
    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('editorials.show', ['editorial' => $editorial]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $editorial = new Editorial();
        $editorial->name = $request->name;
        $editorial->state = $request->state;
        $editorial->save();
        return redirect()->route('editorials.index')->with('mensaje', 'Datos guardados correctamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $editorial = Editorial::findOrFail($id);
        $editorial->name = $request->name;
        $editorial->state = $request->state;
        $editorial->save();
        return redirect()->route('editorials.show', $id)->with('mensaje', 'Datos actualizados correctamente');
    }
    public function destroy($id)
    {
        Editorial::destroy($id);
        return redirect()->route('editorials.index')->with('mensaje', 'Dato eliminado correctamente');
    }
}
