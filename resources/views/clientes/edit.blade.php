@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Editar Cliente') }}</h2>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">Editar Cliente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $cliente->nome) }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $cliente->cpf) }}" required>
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone', $cliente->telefone) }}" required>
                    @error('telefone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $cliente->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha" name="senha">
                    <div class="form-text">Deixe em branco para manter a senha atual</div>
                    @error('senha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="numero_conta" class="form-label">Número da Conta</label>
                    <input type="text" class="form-control @error('numero_conta') is-invalid @enderror" id="numero_conta" name="numero_conta" value="{{ old('numero_conta', $cliente->numero_conta) }}" required>
                    @error('numero_conta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="number" step="0.01" class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="saldo" value="{{ old('saldo', $cliente->saldo) }}" required>
                    @error('saldo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cidade_id" class="form-label">Cidade</label>
                    <select class="form-select @error('cidade_id') is-invalid @enderror" id="cidade_id" name="cidade_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}" {{ old('cidade_id', $cliente->cidade_id) == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }} - {{ $cidade->uf }}</option>
                        @endforeach
                    </select>
                    @error('cidade_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
