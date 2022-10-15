<?php

use App\Http\Controllers\{
    UserController
};
use Illuminate\Support\Facades\Route;

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
