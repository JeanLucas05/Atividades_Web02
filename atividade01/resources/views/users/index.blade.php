@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Usuários</h1>

     {{-- Botão para acessar débitos (apenas quem tem permissão vê) --}}
    @can('viewDebts', App\Models\User::class)
        <a href="{{ route('bibliotecario.debitos') }}" 
           class="btn btn-danger mb-3">
            Ver usuários com débitos
        </a>
    @endcan

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Débito</th>
                <th>Role</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="{{ $user->debit > 0 ? 'table-danger' : '' }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->debit > 0)
                            <span class="badge bg-danger">
                                R$ {{ number_format($user->debit, 2, ',', '.') }}
                            </span>
                        @else
                            <span class="badge bg-success">
                                Sem débitos
                            </span>
                        @endif
                    </td>

                    <td>
                        <span class="badge 
                            @if($user->role === 'admin') bg-danger
                            @elseif($user->role === 'editor') bg-warning text-dark
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>

                    <td>
                        @can('view', $user)
                            <a href="{{ route('users.show', $user) }}" 
                               class="btn btn-info btn-sm">
                                Visualizar
                            </a>
                        @endcan

                        @can('update', $user)
                            <a href="{{ route('users.edit', $user) }}" 
                               class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
