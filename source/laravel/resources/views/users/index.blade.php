<h1>Listagem de Usuários</h1>

<ul>
    {{-- Esse é um comentário que não será renderizado no HTML --}}
    @foreach ($users as $user)    

        {{-- Essa Tag serve para passar os dados para o HTML de maneira segura--}}
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
        | <a href="{{ route('users.show', ['id' => $user->id ]) }}">Ver</a>

        {{-- {!! !!}  Essa tag também faz o mesmo que {{ }}, EXCETO que possui FALHAS NA SEGURANÇA contra XSS --}}
    @endforeach
</ul>