<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;


// Front
Route::controller(PageController::class)->group(function (){
    Route::get('/', 'index')                    ->name('index');
    Route::get('course/{course:slug}', 'course')->name('post');
});
// Crud Cursos
Route::resource('coursers',CourserController::class)->except('show');

// Crud Profesores
Route::resource('teachers',TeacherController::class)->middleware('auth');

// Crud Cursos
Route::resource('categories',CategoryController::class)->middleware('auth');

// Loggin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
