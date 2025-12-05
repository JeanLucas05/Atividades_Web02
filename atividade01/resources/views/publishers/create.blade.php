
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="my-4">Adicionar Authors</h1>
    @can('create', App\Models\Publisher::class)

    <form action="{{ route('publishers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}" 
                required
            >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="address" class="form-label">Endereco</label>
            <input 
                type="adrress" 
                class="form-control @error('address') is-invalid @enderror" 
                id="address" 
                name="address" 
                value="{{ old('address') }}" 
                required
            >
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Salvar
        </button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </form>
    @endcan
</div>
@endsection
