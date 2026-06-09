@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Nova Empresa Parceira') }}</h2>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">Nova Empresa Parceira</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('empresas-parceiras.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="razao_social" class="form-label">Razão Social</label>
                    <input type="text" class="form-control @error('razao_social') is-invalid @enderror" id="razao_social" name="razao_social" value="{{ old('razao_social') }}" required>
                    @error('razao_social')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" required>
                    @error('cnpj')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone') }}" required>
                    @error('telefone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="token_acesso" class="form-label">Token de Acesso</label>
                    <input type="text" class="form-control @error('token_acesso') is-invalid @enderror" id="token_acesso" name="token_acesso" value="{{ old('token_acesso') }}" required>
                    @error('token_acesso')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="number" step="0.01" class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="saldo" value="{{ old('saldo', '0.00') }}" required>
                    @error('saldo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('empresas-parceiras.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
