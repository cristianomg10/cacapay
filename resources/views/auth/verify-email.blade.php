<x-guest-layout>
    <h4 class="text-center mb-4 fw-bold">Verificar E-mail</h4>

    <div class="alert alert-info">
        Obrigado por se cadastrar! Antes de começar, verifique seu e-mail clicando no link que enviamos. Se não recebeu, enviaremos outro.
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="alert alert-success">
        Um novo link de verificação foi enviado para seu e-mail.
    </div>
    @endif

    <div class="d-flex align-items-center justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Reenviar Verificação
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none">
                Sair
            </button>
        </form>
    </div>
</x-guest-layout>
