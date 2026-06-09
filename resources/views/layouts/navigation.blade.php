<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        Painel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cidades.*') ? 'active' : '' }}" href="{{ route('cidades.index') }}">Cidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('empresas-parceiras.*') ? 'active' : '' }}" href="{{ route('empresas-parceiras.index') }}">Empresas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transacoes.*') ? 'active' : '' }}" href="{{ route('transacoes.index') }}">Transações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('creditos.*') ? 'active' : '' }}" href="{{ route('creditos.index') }}">Créditos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('status-transacoes.*') ? 'active' : '' }}" href="{{ route('status-transacoes.index') }}">Status</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>Perfil
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="bi bi-box-arrow-right me-2"></i>Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
