<x-guest-layout>
    @if (session('status'))
    <div class="alert alert-success mb-4">
        {{ session('status') }}
    </div>
    @endif

    <h4 class="text-center mb-4 fw-bold">Entrar</h4>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Lembrar-me</label>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            @if (Route::has('password.request'))
            <a class="text-decoration-none small" href="{{ route('password.request') }}">
                Esqueceu sua senha?
            </a>
            @endif
            <button type="submit" class="btn btn-primary">
                Entrar
            </button>
        </div>
    </form>
</x-guest-layout>
