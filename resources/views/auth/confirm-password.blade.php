<x-guest-layout>
    <h4 class="text-center mb-4 fw-bold">Confirmar Senha</h4>

    <div class="alert alert-warning">
        Esta é uma área segura. Confirme sua senha antes de continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                Confirmar
            </button>
        </div>
    </form>
</x-guest-layout>
