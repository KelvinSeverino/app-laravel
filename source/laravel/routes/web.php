<?php

use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;

/* ROTAS DOS COMENTARIOS */
//Listagem
Route::get('users/{userId}/comments', [CommentController::class, 'index'])->name('comments.index');
//Cricao
Route::get('users/{userId}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('users/{userId}/comments', [CommentController::class, 'store'])->name('comments.store');
//Edicao
Route::put('users/{userId}/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('users/{userId}/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');

/* ROTAS DOS USUARIOS */
//Listagem
Route::get('users/', [UserController::class, 'index'])->name('users.index'); //->name('user.index') define o nome da rota, para ser usado no restante da aplicacao, ao inves de utilizar a URL
//Cricao
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/create', [UserController::class, 'store'])->name('users.store');
//Detalhes
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
//Edicao
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
//Exclusao
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('/', function () {
    return view('welcome');
});
