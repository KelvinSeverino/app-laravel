<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Por Padrao é false, mas como nao sera usado, passaremos true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id ?? null; //Pega o ID do parametro da URL

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email', //Verifica se e do tipo Email
                "unique:users,email,{$id},id" //Verifica se ja existe no BD e cria excecao para informar o email ja gravado do mesmo user
            ],
            'password' => [
                'required',
                'min:6',
                'max:15'
            ],
            'image' => [
                'nullable',
                'image', //Valida os tipos de imagem
                'max:2048' //Tam max de 1MB
            ]
        ];

        //Mudando validacao quando for UPDATE
        if($this->method('PUT')){
            $rules['password'] = [
                'nullable',
                'min:6',
                'max:15'
            ];
        }

        return $rules;
    }
}
