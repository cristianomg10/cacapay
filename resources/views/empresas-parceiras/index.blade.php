@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Empresas Parceiras') }}</h2>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Empresas Parceiras</h1>
        <a href="{{ route('empresas-parceiras.create') }}" class="btn btn-primary">Nova Empresa Parceira</a>
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
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Saldo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresasParceiras as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->razao_social }}</td>
                            <td>{{ $empresa->cnpj }}</td>
                            <td>{{ $empresa->telefone }}</td>
                            <td>{{ $empresa->email }}</td>
                            <td>{{ number_format($empresa->saldo, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('empresas-parceiras.edit', $empresa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('empresas-parceiras.destroy', $empresa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
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
        {{ $empresasParceiras->links() }}
    </div>
@endsection
