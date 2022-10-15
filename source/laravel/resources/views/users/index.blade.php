@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<h1>
    Listagem de Usuários
    (<a href="{{ route('users.create') }}">Adicionar</a>)
</h1>

<ul>
    {{-- Esse é um comentário que não será renderizado no HTML --}}
    @foreach ($users as $user)    

        {{-- Essa Tag serve para passar os dados para o HTML de maneira segura--}}
        <li>{{ $user->name }} - {{ $user->email }} 
            | <a href="{{ route('users.show', ['id' => $user->id ]) }}">Detalhes</a>
            | <a href="{{ route('users.edit', ['id' => $user->id ]) }}">Editar</a></li>  

        {{-- {!! !!}  Essa tag também faz o mesmo que {{ }}, EXCETO que possui FALHAS NA SEGURANÇA contra XSS --}}
    @endforeach
</ul>
@endsection