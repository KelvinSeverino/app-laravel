<?php

use App\Http\Controllers\{
    UserController
};
use Illuminate\Support\Facades\Route;

//Rotas de Usuarios
Route::get('users/', [UserController::class, 'index'])->name('users.index'); //->name('user.index') define o nome da rota, para ser usado no restante da aplicacao, ao inves de utilizar a URL
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users/create', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});
