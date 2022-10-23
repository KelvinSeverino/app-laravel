<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(string|null $search = '')
    {
        //Pesquisa simples
        //$users = $this->where('name', 'LIKE', "%{$search}%")->get();

        //Pesquisa com mais recursos usando funcao de callback
        $users = $this->where(function ($query) use ($search) {
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();

        return $users;
    }

    public function storeUser(object $request)
    {
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
        
        $this->create($data);
    }

    public function updateUser(object $request)
    {
        //Gravacao da maneira tradicional
        /*
        $this->name = $request->name; ou $request->get('name'); 
        $this->save();
        */

        //Pegando dados do formulario
        $data = $request->only('name', 'email');
        if($request->password) //Verificando se informou senha
        {
            $data['password'] = bcrypt($request->password);
        }

        //Atualiza dados
        $this->update($data);
    }

    public function comments($search)
    {
        //Relacionando tabela One to Many
        return $this->hasMany(Comment::class, 'user_id')->where(function ($query) use ($search) {
            if($search){
                $query->where('body', 'LIKE', "%{$search}%");
            }
        });        
    }
}
