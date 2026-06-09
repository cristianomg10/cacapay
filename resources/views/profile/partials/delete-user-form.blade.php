<section>
    <header class="mb-4">
        <h5 class="fw-semibold text-danger">Excluir Conta</h5>
        <p class="text-muted small">Após excluir sua conta, todos os dados serão permanentemente deletados. Antes, baixe as informações que deseja manter.</p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        Excluir Conta
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true" @if($errors->userDeletion->isNotEmpty()) data-bs-show="true" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">Tem certeza que deseja excluir sua conta?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <p class="small text-muted">Após excluir sua conta, todos os dados serão permanentemente deletados. Digite sua senha para confirmar.</p>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input id="password" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="Senha">
                            @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir Conta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
            modal.show();
        });
    </script>
    @endif
</section>
