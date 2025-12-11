@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Perfil do Usuário</h1>

    {{-- Mensagens de sucesso / erro --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('Error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif

    {{-- Dados do Usuário --}}
    <div class="card mb-4">
        <div class="card-header">
            Informações do Usuário
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Papel:</strong> {{ ucfirst($user->role) }}</p>
        </div>
    </div>

    {{-- Histórico de Empréstimos --}}
    <div class="card">
        <div class="card-header">
            Histórico de Empréstimos
        </div>

        <div class="card-body">
            @if($user->books->isEmpty())
                <p>Este usuário não possui empréstimos registrados.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Livro</th>
                            <th>Data de Empréstimo</th>
                            <th>Data de Devolução</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user->books as $book)
                            <tr>
                                <td>
                                    <a href="{{ route('books.show', $book->id) }}">
                                        {{ $book->title }}
                                    </a>
                                </td>

                                <td>{{ $book->pivot->borrowed_at }}</td>

                                <td>
                                    {{ $book->pivot->returned_at ?? 'Em Aberto' }}
                                </td>

                                <td>
                                    @if(is_null($book->pivot->returned_at))
                                        <form action="{{ route('borrowings.return', $book->pivot->id) }}" 
                                              method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')

                                            <button class="btn btn-warning btn-sm">
                                                Devolver
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @endif
        </div>
    </div>
    

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">
        Voltar
    </a>
</div>
@endsection
