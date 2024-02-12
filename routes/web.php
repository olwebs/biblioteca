<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookreaderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () { return view('index');})->middleware(middleware:'auth')->name('index');

Route::get('/', [DashboardController::class, 'index'])->middleware(middleware:'auth')->name('index');
Route::view('/login', function () { return view('auth.login'); })->name('login');
Auth::routes(['register' => true]);

Route::resource('/authors', AuthorController::class)->middleware('can:authors');
Route::resource('/editorials', EditorialController::class)->middleware('can:editorials');
Route::resource('/subjects', SubjectController::class)->middleware('can:subjects');
Route::resource('/books', BookController::class)->middleware('can:books');
Route::resource('/users', UserController::class)->middleware('can:users');

Route::resource('/bookreaders', BookreaderController::class);
Route::resource('/loans', BookreaderController::class);
Route::get('/loans', [BookreaderController::class, 'indexloan'])->name('loans.index');
Route::resource('/consultations', BookreaderController::class);
Route::get('/consultations', [BookreaderController::class, 'indexconsultation'])->name('consultations.index');
