@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Novo Crédito') }}</h2>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">Novo Crédito</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('creditos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select class="form-select @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" required>
                        <option value="">Selecione...</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }} ({{ $cliente->cpf }})</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{ old('valor') }}" required>
                    @error('valor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="datetime-local" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{ old('data') }}" required>
                    @error('data')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('creditos.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
