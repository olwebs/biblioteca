<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $materias = Subject::all()->sortByDesc('id');
        return view('subjects.index', ['materias' => $materias]);
    }
    public function create()
    {
        return view('subjects.create');
    }
    public function edit($id)
    {
        $materia = Subject::findOrFail($id);
        return view('subjects.edit', ['materia' => $materia]);
    }
    public function show($id)
    {
        $materia = Subject::findOrFail($id);
        return view('subjects.show', ['materia' => $materia]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:subjects',
        ]);
        $materia = new Subject();
        $materia->name = $request->name;
        $materia->state = $request->state;
        $materia->save();
        return redirect()->route('subjects.index')->with('mensaje', 'Datos guardados correctamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|unique:subjects',
        ]);
        $materia = Subject::findOrFail($id);
        $materia->name = $request->name;
        $materia->state = $request->state;
        $materia->save();
        return redirect()->route('subjects.show', $id)->with('mensaje', 'Datos actualizados correctamente');
    }
    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect()->route('subjects.index')->with('mensaje', 'Dato eliminado correctamente');
    }
}
