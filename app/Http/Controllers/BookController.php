<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorsBook;
use App\Models\Book;
use App\Models\Editorial;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {

        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        $libros = Book::all()->sortByDesc('id');

        return view('books.index', [
            'libros' => $libros,
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
        ]);
    }

    public function create()
    {
        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        $libros = Book::all();
       return view('books.create',[
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
            'libros' => $libros,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'editorial_id' => 'required',
            'author_id' => 'required',
            'subject_id' => 'required',
        ]);
        $libro = new Book();
        $libro->title = $request->title;
        $libro->sinopsis = $request->sinopsis;
        $libro->state = $request->state;
        $libro->observations = $request->observations;
        if($request->file('photo') != ""){
            $libro->photo = $request->file('photo')->store('images_books','public');
        }else{
            $libro->photo = "images_books/icon-libro.png";
        }
        $libro->editorial_id = $request->editorial_id;
        $libro->subject_id = $request->subject_id;
        $libro->save();
    
        $autor_libro = new AuthorsBook();
        $autor_libro->authors_id = $request->author_id;
        $autor_libro->books_id = $libro->id;
        $autor_libro->save();
        
        return redirect()->route('books.index')->with('mensaje', 'Datos guardados correctamente');
    }

    public function show($id)
    {
        $autores_libros = AuthorsBook::all();
        $autores = Author::all();
        $libro = Book::findOrFail($id);
        return view('books.show', [
            'libro' => $libro,
            'autores' => $autores,
            'autores_libros' => $autores_libros,
        ]);
    }

    public function edit($id)
    {
        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        $libro = Book::findOrFail($id);
        return view('books.edit', [
            'libro' => $libro,
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'editorial_id' => 'required',
            'author_id' => 'required',
            'subject_id' => 'required',
        ]);
        $libro = Book::findOrFail($id);
        $libro->title = $request->title;
        $libro->sinopsis = $request->sinopsis;
        $libro->state = $request->state;
        $libro->observations = $request->observations;
        
        if($libro->photo != "images_books/icon-libro.png"){
            Storage::delete('public/'.$libro->photo);
            $libro->photo = $request->file('photo')->store('images_books','public');
        }else{
            $libro->photo = $request->file('photo')->store('images_books','public');
        }
        
        $libro->editorial_id = $request->editorial_id;
        $libro->subject_id = $request->subject_id;
        $libro->save();

        $autor_libro = new AuthorsBook();
        $autor_libro->authors_id = $request->author_id;
        $autor_libro->books_id = $libro->id;
        $autor_libro->save();
    
        return redirect()->route('books.show', $id)->with('mensaje', 'Datos actualizados correctamente');
    }

    public function destroy($id)
    {
        $libro = Book::findOrFail($id);
        if($libro->photo != "images_books/icon-libro.png"){
            Storage::delete('public/'.$libro->photo);
        }
        Book::destroy($id);
        return redirect()->route('books.index')->with('mensaje', 'Dato eliminado correctamente');
    }
}
