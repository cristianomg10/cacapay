<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} — Plataforma Inteligente de Pagamentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Início</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    @auth('cliente')
                        <a href="{{ route('cliente.dashboard') }}" class="btn btn-primary rounded-pill px-4">Meu Painel</a>
                    @elseauth
                        @if (Auth::user()?->is_admin)
                            <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill px-4">Painel Admin</a>
                        @else
                            <a href="{{ route('cliente.dashboard') }}" class="btn btn-primary rounded-pill px-4">Meu Painel</a>
                        @endif
                    @else
                        <a href="{{ route('cliente.login') }}" class="btn btn-outline-secondary rounded-pill px-4">Área do Cliente</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Cadastre-se</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-primary bg-gradient text-white">
        <div class="container py-6" style="padding-top: 6rem; padding-bottom: 6rem;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold lh-1 mb-3">{{ config('app.name', 'Laravel') }} — Plataforma Inteligente de Pagamentos</h1>
                    <p class="lead fs-5 mb-4 opacity-90">Gerencie cobranças, parceiros e transações em tempo real com uma plataforma moderna, segura e escalável.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">Comece Agora</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-semibold">Entrar</a>
                        <a href="{{ route('cliente.login') }}" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-semibold">Área do Cliente</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <i class="bi bi-credit-card-2-front" style="font-size: 10rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-people fs-1 text-primary mb-3 d-block"></i>
                            <h5 class="fw-bold">Gestão de Clientes</h5>
                            <p class="text-muted small mb-0">Cadastre e organize sua base de clientes com facilidade e segurança.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-shop fs-1 text-primary mb-3 d-block"></i>
                            <h5 class="fw-bold">Empresas Parceiras</h5>
                            <p class="text-muted small mb-0">Conecte empresas ao ecossistema de pagamentos inteligentes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-arrow-left-right fs-1 text-primary mb-3 d-block"></i>
                            <h5 class="fw-bold">Transações em Tempo Real</h5>
                            <p class="text-muted small mb-0">Acompanhe cada movimentação financeira instantaneamente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-3">
                        <div class="card-body text-center">
                            <i class="bi bi-credit-card fs-1 text-primary mb-3 d-block"></i>
                            <h5 class="fw-bold">Crédito Rápido</h5>
                            <p class="text-muted small mb-0">Ofereça linhas de crédito ágeis com aprovação simplificada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary bg-gradient text-white">
        <div class="container py-5">
            <div class="row text-center g-4">
                <div class="col-4">
                    <div class="fs-1 fw-bold">10+</div>
                    <div class="opacity-75">Cidades</div>
                </div>
                <div class="col-4">
                    <div class="fs-1 fw-bold">100+</div>
                    <div class="opacity-75">Empresas</div>
                </div>
                <div class="col-4">
                    <div class="fs-1 fw-bold">1000+</div>
                    <div class="opacity-75">Transações</div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0 small opacity-75">&copy; 2026 {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
