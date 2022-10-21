@extends('layouts.app')

@section('title', "Novo Comentário do Usuário { $user->name }")

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Novo Comentário do Usuário {{ $user->name }}</h1>

@include('includes/validationsForm')

<form action="{{ route('comments.store', $user->id) }}" method="post">
    @csrf
    @include('users/comments/_partials/form')
</form>
@endsection