@extends('layouts.app')

@section('header')
    <h2 class="h4 fw-bold mb-0">{{ __('Dashboard') }}</h2>
@endsection

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('cidades.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Cidades') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $cidadesCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-building fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('clientes.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Clientes') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $clientesCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-people fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('empresas-parceiras.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Empresas Parceiras') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $empresasParceirasCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-shop fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('transacoes.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Transações') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $transacoesCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-arrow-left-right fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('creditos.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-secondary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Créditos') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $creditosCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-credit-card fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3">
            <a href="{{ route('status-transacoes.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-1 text-white-50">{{ __('Status') }}</h6>
                                <h3 class="card-title mb-0 fw-bold">{{ $statusTransacoesCount ?? 0 }}</h3>
                            </div>
                            <i class="bi bi-tags fs-1 opacity-50"></i>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Ver lista &rarr;</small>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="card-title mb-0 fw-semibold">{{ __('Bem-vindo') }}</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-success mb-0">
                <i class="bi bi-check-circle-fill me-2"></i>
                Você está logado no Caçapay!
            </div>
        </div>
    </div>
@endsection
