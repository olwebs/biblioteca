<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorsBook;
use App\Models\Book;
use App\Models\BooksUser;
use App\Models\Editorial;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookreaderController extends Controller
{
    public function index()
    {
        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        $libros = Book::all()->where('state', '=', 1)->sortByDesc('id');
        $libros_usuarios = BooksUser::all();
        return view('bookreaders.index', [
            'libros' => $libros,
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
            'libros_usuarios' => $libros_usuarios,
        ]);
    }
    public function indexloan()
    {
        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        
        if(Auth::user()->id != 1 && Auth::user()->id != 2 && Auth::user()->id != 3 ){
            $libros_usuarios = BooksUser::all()->where('user_id', '=', Auth::user()->id)->where('action', '=', 'PRESTAMO');
        }else{
            $libros_usuarios = BooksUser::all()->where('action', '=', 'PRESTAMO');
        }
        
        $libros = Book::all()->where('state', '=', 1)->sortByDesc('id');
        
        return view('loans.index', [
            'libros' => $libros,
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
            'libros_usuarios' => $libros_usuarios,
        ]);
    }
    public function indexconsultation()
    {
        $autores_libros = AuthorsBook::all();
        $materias = Subject::all();
        $autores = Author::all();
        $editoriales = Editorial::all();
        
        if(Auth::user()->id != 1 && Auth::user()->id != 2 && Auth::user()->id != 3 ){
            $libros_usuarios = BooksUser::all()->where('user_id', '=', Auth::user()->id)->where('action', '=', 'CONSULTA')->unique('book_id');
        }else{
            $libros_usuarios = BooksUser::all()->where('action', '=', 'CONSULTA')->unique('book_id');
        }
        
        $libros = Book::all()->where('state', '=', 1)->sortByDesc('id');
        
        return view('consultations.index', [
            'libros' => $libros,
            'materias' => $materias,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'autores_libros' => $autores_libros,
            'libros_usuarios' => $libros_usuarios,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    // Consultar
    public function show($id_libro)
    {
        $autores_libros = AuthorsBook::all();
        $autores = Author::all();
        $libro = Book::findOrFail($id_libro);
        $libros_usuarios = BooksUser::all();

        $libro_usuario = new BooksUser();
        $libro_usuario->user_id = Auth::user()->id;
        $libro_usuario->book_id = $id_libro;
        $libro_usuario->action = "CONSULTA";
        $libro_usuario->save();

        return view('bookreaders.show', [
            'libro' => $libro,
            'autores' => $autores,
            'autores_libros' => $autores_libros,
            'libros_usuarios' => $libros_usuarios,
        ]);
    }
    // Préstamo
    public function edit($id_libro)
    {
        $libro_usuario = new BooksUser();
        $libro_usuario->user_id = Auth::user()->id;
        $libro_usuario->book_id = $id_libro;
        $libro_usuario->action = "PRESTAMO";
        $libro_usuario->save();
        return redirect()->route('bookreaders.index')->with('mensaje', 'LIbro en préstamo');
    }

    public function update(Request $request, $id)
    {
        //
    }
    // Devolver
    public function destroy($id)
    {
        BooksUser::where('action', '=', 'PRESTAMO')->where('book_id','=',$id)->where('user_id','=',Auth::user()->id)->delete();
        return redirect()->route('bookreaders.index')->with('mensaje', 'Libro devuelto correctamente');
    }
}
