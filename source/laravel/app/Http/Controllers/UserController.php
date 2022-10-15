<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = new User;    
    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers(
            search: $request->search ?? '' //Passando usando recurso de Parametro nomeado do PHP8
        );

        return view('users/index', compact('users')); //compact é a mesma coisa que usar o ["users" => $users]
    }

    public function show($id)
    {
        //$user = $this->model->where('id', $id)->first();

        //Verifica se exste usuario, caso contrario retorna a index
        if(!$user = $this->model->find($id))        
            return redirect()->route('users.index');
        
        //Acessa rota com dados do usuario
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request) //Request $request é funcao nativa que pega todos os dados vindo do form
    {
        //Informa quais inputs serao considerados
        /*dd($request->only([
            'name',
            'email',
            'password'
        ]));*/

        //Pega todos os inputs
        //dd($request->all());

        //Chama metodo de gravar no BD
        $this->model->storeUser($request);

        //Redireciona para Listagem
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        //Verifica se exste usuario, caso contrario retorna a index
        if(!$user = $this->model->find($id))        
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        //Verifica se exste usuario, caso contrario retorna a index
        if(!$user = $this->model->find($id))        
            return redirect()->route('users.index');

        $user->updateUser($request, $id);

        //Redireciona para Index
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        //Verifica se exste usuario, caso contrario retorna a index
        if(!$user = $this->model->find($id))        
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }
}
