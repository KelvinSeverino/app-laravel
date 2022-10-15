@extends('layouts.app')

@section('title', 'Lista do usuário')

@section('content')
<h1>Lista do usuário {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
</ul>
<form action="{{ route('users.delete', $user->id) }}" method="post">
    @method('delete')
    @csrf
    <button>Deletar</button>
</form>
@endsection