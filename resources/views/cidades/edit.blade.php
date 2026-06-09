@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Editar Cidade') }}</h2>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">Editar Cidade</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('cidades.update', $cidade->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $cidade->nome) }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" class="form-control @error('uf') is-invalid @enderror" id="uf" name="uf" value="{{ old('uf', $cidade->uf) }}" maxlength="2" required>
                    @error('uf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cidades.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
