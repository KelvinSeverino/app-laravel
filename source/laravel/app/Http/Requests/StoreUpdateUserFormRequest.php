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
        return [
            'name' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email', //Verifica se e do tipo Email
                'unique:users' //Verifica se ja existe no BD
            ],
            'password' => [
                'required',
                'min:6',
                'max:15'
            ]
        ];
    }
}
