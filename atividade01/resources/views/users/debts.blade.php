@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="my-4">Usuários com Débito</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($users->isEmpty())
        <div class="alert alert-success">
            Nenhum usuário possui débitos.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Débito</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr class="table-danger">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <span class="badge bg-danger">
                                R$ {{ number_format($user->debit, 2, ',', '.') }}
                            </span>
                        </td>

                        <td>
                            <form method="POST"
                                  action="{{ route('bibliotecario.debitos.zerar', $user) }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-success btn-sm">
                                    Zerar Débito
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('users.index') }}" class="btn btn-secondary">
        Voltar para usuários
    </a>

</div>
@endsection
