<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Caçapay — Área do Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex flex-column align-items-center justify-content-center min-vh-100 py-5">
    <div class="text-center mb-4">
        <a href="/" class="text-decoration-none">
            <h1 class="h3 fw-bold text-primary">Caçapay</h1>
            <p class="text-muted small">Área do Cliente</p>
        </a>
    </div>

    <div class="card shadow" style="max-width: 450px; width: 100%;">
        <div class="card-body p-4">
            <h4 class="text-center mb-4 fw-bold">Entrar</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form method="POST" action="{{ route('cliente.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input id="senha" type="password" class="form-control @error('senha') is-invalid @enderror" name="senha" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="/" class="text-decoration-none small">Voltar ao início</a>
            </div>
        </div>
    </div>
</body>
</html>
