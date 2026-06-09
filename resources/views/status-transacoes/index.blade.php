@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Status de Transações') }}</h2>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Status de Transações</h1>
        <a href="{{ route('status-transacoes.create') }}" class="btn btn-primary">Novo Status</a>
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
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statusTransacoes as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->nome }}</td>
                            <td>
                                <a href="{{ route('status-transacoes.edit', $status->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('status-transacoes.destroy', $status->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
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
        {{ $statusTransacoes->links() }}
    </div>
@endsection
