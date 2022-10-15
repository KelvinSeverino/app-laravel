@extends('layouts.app')

@section('title', 'Edição de Usuário')

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Editar o Usuário {{ $user->name }}</h1>

@include('includes/validationsForm')

<form action="{{ route('users.update', $user->id) }}" method="post">    
    @method('put') <!-- O metodo do lado cria esse input <input type="hidden" name="_method" value="put">-->
    @include('users/_partials/form')
</form>
@endsection