@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Cidades') }}</h2>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Cidades</h1>
        <a href="{{ route('cidades.create') }}" class="btn btn-primary">Nova Cidade</a>
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
                        <th>UF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr>
                            <td>{{ $cidade->id }}</td>
                            <td>{{ $cidade->nome }}</td>
                            <td>{{ $cidade->uf }}</td>
                            <td>
                                <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('cidades.destroy', $cidade->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
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
        {{ $cidades->links() }}
    </div>
@endsection
