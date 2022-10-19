<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Indica quais colunas podem ser preenchidas
    protected $fillable = [
        'body', 
        'visible',
    ];

    //Realiza testes automaticos para verificar tipo
    protected $casts = [
        'visible' => 'boolean'
    ];

    public function user()
    {
        //Relacionando tabela, Many to One
        return $this->belongsTo(User::class);
    }
}
