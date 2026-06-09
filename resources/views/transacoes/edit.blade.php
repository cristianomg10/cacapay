@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Editar Transação') }}</h2>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">Editar Transação</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('transacoes.update', $transacao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="datetime-local" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{ old('data', \Carbon\Carbon::parse($transacao->data)->format('Y-m-d\TH:i')) }}" required>
                    @error('data')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select class="form-select @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id', $transacao->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }} ({{ $cliente->cpf }})</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="empresa_parceira_id" class="form-label">Empresa Parceira</label>
                    <select class="form-select @error('empresa_parceira_id') is-invalid @enderror" id="empresa_parceira_id" name="empresa_parceira_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($empresasParceiras as $empresa)
                            <option value="{{ $empresa->id }}" {{ old('empresa_parceira_id', $transacao->empresa_parceira_id) == $empresa->id ? 'selected' : '' }}>{{ $empresa->razao_social }}</option>
                        @endforeach
                    </select>
                    @error('empresa_parceira_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{ old('valor', $transacao->valor) }}" required>
                    @error('valor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status_id" class="form-label">Status</label>
                    <select class="form-select @error('status_id') is-invalid @enderror" id="status_id" name="status_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($statusTransacoes as $status)
                            <option value="{{ $status->id }}" {{ old('status_id', $transacao->status_id) == $status->id ? 'selected' : '' }}>{{ $status->nome }}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('transacoes.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
