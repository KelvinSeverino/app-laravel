@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<h1>Novo Usuário</h1>

<form action="{{ route('users.store') }}" method="post">
    {{ csrf_token() }}
    <input type="text" name="name" id="" placeholder="Nome">
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <button type="submit">Enviar</button>
</form>
@endsection