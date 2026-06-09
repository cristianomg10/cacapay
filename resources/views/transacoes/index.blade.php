@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Transações') }}</h2>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Transações</h1>
        <a href="{{ route('transacoes.create') }}" class="btn btn-primary">Nova Transação</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th>Empresa Parceira</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transacoes as $transacao)
                        <tr>
                            <td>{{ $transacao->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($transacao->data)->format('d/m/Y H:i') }}</td>
                            <td>{{ $transacao->cliente?->nome ?? '-' }}</td>
                            <td>{{ $transacao->empresaParceira?->razao_social ?? '-' }}</td>
                            <td>{{ number_format($transacao->valor, 2, ',', '.') }}</td>
                            <td>{{ $transacao->statusTransacao?->nome ?? '-' }}</td>
                            <td>
                                <a href="{{ route('transacoes.edit', $transacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('transacoes.destroy', $transacao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $transacoes->links() }}
    </div>
@endsection
