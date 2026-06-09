<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusTransacaoRequest;
use App\Http\Requests\UpdateStatusTransacaoRequest;
use App\Models\StatusTransacao;

class StatusTransacaoController extends Controller
{
    public function index()
    {
        $statusTransacoes = StatusTransacao::paginate(10);
        return view('status-transacoes.index', compact('statusTransacoes'));
    }

    public function create()
    {
        return view('status-transacoes.create');
    }

    public function store(StoreStatusTransacaoRequest $request)
    {
        StatusTransacao::create($request->validated());
        session()->flash('success', 'Status cadastrado com sucesso!');
        return redirect()->route('status-transacoes.index');
    }

    public function edit(StatusTransacao $statusTransacao)
    {
        return view('status-transacoes.edit', compact('statusTransacao'));
    }

    public function update(UpdateStatusTransacaoRequest $request, StatusTransacao $statusTransacao)
    {
        $statusTransacao->update($request->validated());
        session()->flash('success', 'Status atualizado com sucesso!');
        return redirect()->route('status-transacoes.index');
    }

    public function destroy(StatusTransacao $statusTransacao)
    {
        $statusTransacao->delete();
        session()->flash('success', 'Status excluído com sucesso!');
        return redirect()->route('status-transacoes.index');
    }
}
