<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index()
    {
        $autores = Author::all()->sortByDesc('id');
        return view('authors.index', ['autores' => $autores]);
    }
    public function create()
    {
        return view('authors.create');
    }
    public function edit($id)
    {
        $autor = Author::findOrFail($id);
        return view('authors.edit', ['autor' => $autor]);
    }
    public function show($id)
    {
        //echo $id;
        $autor = Author::findOrFail($id);
        //dd($autor->name);
        //return response()->json($autor);

        return view('authors.show', ['autor' => $autor]);
    }
    public function store(Request $request)
    {
        //$autor = request()->all();
        //return response()->json($autor);
        //dd($request->input('name')." - ".$request->input('state'));
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $autor = new Author();
        $autor->name = $request->name;
        $autor->birthdate = $request->birthdate;
        $autor->gender = $request->gender;
        $autor->state = $request->state;
        $autor->save();
        return redirect()->route('authors.index')->with('mensaje', 'Datos guardados correctamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $autor = Author::findOrFail($id);
        $autor->name = $request->name;
        $autor->birthdate = $request->birthdate;
        $autor->gender = $request->gender;
        $autor->state = $request->state;
        $autor->save();
        return redirect()->route('authors.show', $id)->with('mensaje', 'Datos actualizados correctamente');
    }
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->route('authors.index')->with('mensaje', 'Dato eliminado correctamente');
    }
}
