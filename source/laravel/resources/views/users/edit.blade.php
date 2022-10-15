@extends('layouts.app')

@section('title', 'Edição de Usuário')

@section('content')
<h1>Editar o Usuário {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">        
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user->id) }}" method="post">    
    @method('put') <!-- O metodo do lado cria esse input <input type="hidden" name="_method" value="put">-->
    @csrf

    <input type="text" name="name" id="" placeholder="Nome" value="{{ $user->name }}">
    <input type="email" name="email" id="" placeholder="Email" value="{{ $user->email }}">
    <input type="password" name="password" id="" placeholder="Password">
    <button type="submit">Enviar</button>
</form>
@endsection