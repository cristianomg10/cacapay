<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Caçapay — Meu Extrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ route('cliente.extrato') }}">Caçapay</a>
            <span class="navbar-text ms-2 small text-muted d-none d-md-inline">Área do Cliente</span>
            <div class="ms-auto">
                <span class="navbar-text me-3">{{ $cliente->nome }}</span>
                <form method="POST" action="{{ route('cliente.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-primary text-white">
                        <div class="card-body text-center">
                            <i class="bi bi-wallet2 fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Saldo</h6>
                            <h3 class="card-title mb-0 fw-bold">R$ {{ number_format($cliente->saldo, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-success text-white">
                        <div class="card-body text-center">
                            <i class="bi bi-credit-card fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Conta</h6>
                            <h3 class="card-title mb-0 fw-bold">{{ $cliente->numero_conta }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-info text-white">
                        <div class="card-body text-center">
                            <i class="bi bi-person fs-1 d-block mb-2"></i>
                            <h6 class="card-subtitle mb-1 text-white-50">Cliente</h6>
                            <h3 class="card-title mb-0 fw-bold small">{{ $cliente->nome }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-semibold">Extrato de Transações</h5>
                </div>
                <div class="card-body">
                    @if ($transacoes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Empresa</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transacoes as $transacao)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($transacao->data)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $transacao->empresaParceira?->razao_social ?? '-' }}</td>
                                            <td>R$ {{ number_format($transacao->valor, 2, ',', '.') }}</td>
                                            <td>
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
                        <p class="text-muted mb-0 text-center py-4">Nenhuma transação encontrada.</p>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                {{ $transacoes->links() }}
            </div>

            <div class="text-center mt-4">
                <a href="/" class="text-decoration-none small text-muted">&copy; 2026 Caçapay. Todos os direitos reservados.</a>
            </div>
        </div>
    </main>
</body>
</html>
