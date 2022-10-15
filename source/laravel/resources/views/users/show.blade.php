@extends('layouts.app')

@section('title', 'Lista do usuário')

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Lista do usuário {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
</ul>
<form action="{{ route('users.delete', $user->id) }}" method="post" class="py-12">
    @method('delete')
    @csrf
    <button class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
</form>
@endsection