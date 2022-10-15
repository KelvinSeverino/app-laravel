<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users/index', compact('users')); //compact é a mesma coisa que usar o ["users" => $users]
    }

    public function show($id)
    {
        //$user = User::where('id', $id)->first();

        //Verifica se exste usuario, caso contrario retorna a index
        if(!$user = User::find($id))        
            return redirect()->route('users.index');
        
        //Acessa rota com dados do usuario
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        dd('cadastrando');
    }
}
