<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Caçapay — Painel do Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('cliente.dashboard') }}">Caçapay</a>
            <span class="navbar-text ms-2 small text-muted d-none d-md-inline">Área do Cliente</span>
            <div class="ms-auto">
                <span class="navbar-text me-3"><i class="bi bi-person-circle me-1"></i>{{ $cliente->nome }}</span>
                <form method="POST" action="{{ route('cliente.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Painel do Cliente</h4>
                <span class="text-muted small">{{ now()->format('d/m/Y') }}</span>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-primary text-white h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="bi bi-wallet2 fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Saldo Disponível</h6>
                            <h2 class="card-title mb-0 fw-bold">R$ {{ number_format($cliente->saldo, 2, ',', '.') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-success text-white h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="bi bi-arrow-up-circle fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Pagamentos no Mês</h6>
                            <h2 class="card-title mb-0 fw-bold">R$ {{ number_format($pagamentosMes, 2, ',', '.') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-info text-white h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <i class="bi bi-receipt fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Total de Transações</h6>
                            <h2 class="card-title mb-0 fw-bold">{{ $totalTransacoes }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-semibold">
                        <i class="bi bi-clock-history me-2"></i>Pagamentos Recentes
                    </h5>
                    <a href="{{ route('cliente.extrato') }}" class="btn btn-outline-primary btn-sm">
                        Ver Extrato Completo <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if ($transacoesRecentes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Data</th>
                                        <th>Empresa</th>
                                        <th>Valor</th>
                                        <th class="pe-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transacoesRecentes as $transacao)
                                        <tr>
                                            <td class="ps-3">{{ Carbon\Carbon::parse($transacao->data)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $transacao->empresaParceira?->razao_social ?? '-' }}</td>
                                            <td>R$ {{ number_format($transacao->valor, 2, ',', '.') }}</td>
                                            <td class="pe-3">
                                                @php
                                                    $badge = match ($transacao->statusTransacao?->nome) {
                                                        'Aprovado' => 'success',
                                                        'Pendente' => 'warning',
                                                        'Recusado' => 'danger',
                                                        'Cancelado' => 'secondary',
                                                        'Estornado' => 'info',
                                                        default => 'secondary',
                                                    };
                                                @endphp
                                                <span class="badge bg-{{ $badge }}">{{ $transacao->statusTransacao?->nome ?? '-' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0 text-center py-5">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Nenhum pagamento realizado ainda.
                        </p>
                    @endif
                </div>
            </div>

            @if ($transacoesRecentes->count() > 0)
            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-credit-card fs-2 text-muted d-block mb-2"></i>
                            <h6 class="text-muted mb-1">Número da Conta</h6>
                            <h5 class="fw-bold mb-0">{{ $cliente->numero_conta }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-geo-alt fs-2 text-muted d-block mb-2"></i>
                            <h6 class="text-muted mb-1">Localização</h6>
                            <h5 class="fw-bold mb-0">{{ $cliente->cidade?->nome ?? '-' }}/{{ $cliente->cidade?->uf ?? '' }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="text-center mt-4">
                <a href="/" class="text-decoration-none small text-muted">&copy; {{ date('Y') }} Caçapay. Todos os direitos reservados.</a>
            </div>
        </div>
    </main>
</body>
</html>