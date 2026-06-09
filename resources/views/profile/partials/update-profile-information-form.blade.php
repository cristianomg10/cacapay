<section>
    <header class="mb-4">
        <h5 class="fw-semibold">Informações do Perfil</h5>
        <p class="text-muted small">Atualize as informações do seu perfil e endereço de e-mail.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="small text-muted mb-0">
                    Seu e-mail não foi verificado.
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">
                        Clique aqui para reenviar o e-mail de verificação.
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                <p class="small text-success mt-1 mb-0">Um novo link de verificação foi enviado para seu e-mail.</p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
            @if (session('status') === 'profile-updated')
            <span class="text-success small">Salvo.</span>
            @endif
        </div>
    </form>
</section>
