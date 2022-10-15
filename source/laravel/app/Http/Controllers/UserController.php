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

    public function store(Request $request) //Request $request é funcao nativa que pega todos os dados vindo do form
    {
        //Informa quais inputs serao considerados
        /*dd($request->only([
            'name',
            'email',
            'password'
        ]));*/

        //Pega todos os inputs
        //dd($request->all());

        //Gravacao da maneira tradicional
        /*
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        */

        //Gravacao de maneira mais pratica e otimizada
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        User::create($data);

        //Redireciona para Listagem
        return redirect()->route('users.index');
    }
}
