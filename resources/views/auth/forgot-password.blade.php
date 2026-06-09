<x-guest-layout>
    <h4 class="text-center mb-4 fw-bold">Esqueceu a Senha</h4>

    <div class="alert alert-info">
        Esqueceu sua senha? Sem problemas. Informe seu e-mail e enviaremos um link para redefini-la.
    </div>

    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                Enviar Link de Redefinição
            </button>
        </div>
    </form>
</x-guest-layout>
