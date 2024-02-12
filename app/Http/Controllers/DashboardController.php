<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BooksUser;
use App\Models\Editorial;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $num_usuarios = User::count();
        $num_autores = Author::count();
        $num_libros = Book::count();
        $num_materias = Subject::count();
        $num_editoriales = Editorial::count();
        if(Auth::user()->id != 1 && Auth::user()->id != 2 && Auth::user()->id != 3 ){
            $num_consultas = BooksUser::all()->where('user_id', '=', Auth::user()->id)->where('action', '=', 'CONSULTA')->unique('book_id')->count();
        }else{
            $num_consultas = BooksUser::all()->where('action', '=', 'CONSULTA')->count();
        }
        if(Auth::user()->id != 1 && Auth::user()->id != 2 && Auth::user()->id != 3 ){
            $num_prestamos = BooksUser::all()->where('user_id', '=', Auth::user()->id)->where('action', '=', 'PRESTAMO')->count();
        }else{
            $num_prestamos = BooksUser::all()->where('action', '=', 'PRESTAMO')->count();
        }
        $num_lectores = User::count()-3;
        return view('index', [
            'num_autores' => $num_autores,
            'num_usuarios' => $num_usuarios,
            'num_libros' => $num_libros,
            'num_materias' => $num_materias,
            'num_editoriales' => $num_editoriales,
            'num_prestamos' => $num_prestamos,
            'num_consultas' => $num_consultas,
            'num_lectores' => $num_lectores,
        ]);
    }
}
