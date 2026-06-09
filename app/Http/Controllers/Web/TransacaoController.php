<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransacaoRequest;
use App\Http\Requests\UpdateTransacaoRequest;
use App\Models\Cliente;
use App\Models\EmpresaParceira;
use App\Models\StatusTransacao;
use App\Models\Transacao;
use App\Services\TransacaoService;

class TransacaoController extends Controller
{
    public function __construct(
        protected TransacaoService $transacaoService
    ) {}

    public function index()
    {
        $transacoes = Transacao::with(['cliente', 'empresaParceira', 'statusTransacao'])->paginate(10);
        return view('transacoes.index', compact('transacoes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $empresasParceiras = EmpresaParceira::all();
        $statusTransacoes = StatusTransacao::all();
        return view('transacoes.create', compact('clientes', 'empresasParceiras', 'statusTransacoes'));
    }

    public function store(StoreTransacaoRequest $request)
    {
        try {
            $this->transacaoService->criarTransacao($request->validated());
            session()->flash('success', 'Transação cadastrada com sucesso!');
        } catch (\RuntimeException $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('transacoes.index');
    }

    public function edit(Transacao $transacao)
    {
        $clientes = Cliente::all();
        $empresasParceiras = EmpresaParceira::all();
        $statusTransacoes = StatusTransacao::all();
        return view('transacoes.edit', compact('transacao', 'clientes', 'empresasParceiras', 'statusTransacoes'));
    }

    public function update(UpdateTransacaoRequest $request, Transacao $transacao)
    {
        try {
            $this->transacaoService->atualizarTransacao($transacao, $request->validated());
            session()->flash('success', 'Transação atualizada com sucesso!');
        } catch (\RuntimeException $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('transacoes.index');
    }

    public function destroy(Transacao $transacao)
    {
        $this->transacaoService->deletarTransacao($transacao);
        session()->flash('success', 'Transação excluída com sucesso!');
        return redirect()->route('transacoes.index');
    }
}
