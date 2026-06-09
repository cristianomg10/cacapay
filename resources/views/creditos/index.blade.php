@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Créditos') }}</h2>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Créditos</h1>
        <a href="{{ route('creditos.create') }}" class="btn btn-primary">Novo Crédito</a>
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
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($creditos as $credito)
                        <tr>
                            <td>{{ $credito->id }}</td>
                            <td>{{ $credito->cliente?->nome ?? '-' }}</td>
                            <td>{{ number_format($credito->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($credito->data)->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('creditos.edit', $credito->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('creditos.destroy', $credito->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
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
        {{ $creditos->links() }}
    </div>
@endsection
