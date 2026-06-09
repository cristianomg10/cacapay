<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditoRequest;
use App\Http\Requests\UpdateCreditoRequest;
use App\Models\Cliente;
use App\Models\Credito;
use App\Services\CreditoService;

class CreditoController extends Controller
{
    private CreditoService $creditoService;

    public function __construct(CreditoService $creditoService)
    {
        $this->creditoService = $creditoService;
    }

    public function index()
    {
        $creditos = Credito::with('cliente')->paginate(10);
        return view('creditos.index', compact('creditos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('creditos.create', compact('clientes'));
    }

    public function store(StoreCreditoRequest $request)
    {
        $this->creditoService->criarCredito($request->validated());
        session()->flash('success', 'Crédito cadastrado com sucesso!');
        return redirect()->route('creditos.index');
    }

    public function edit(Credito $credito)
    {
        $clientes = Cliente::all();
        return view('creditos.edit', compact('credito', 'clientes'));
    }

    public function update(UpdateCreditoRequest $request, Credito $credito)
    {
        $this->creditoService->atualizarCredito($credito, $request->validated());
        session()->flash('success', 'Crédito atualizado com sucesso!');
        return redirect()->route('creditos.index');
    }

    public function destroy(Credito $credito)
    {
        $this->creditoService->deletarCredito($credito);
        session()->flash('success', 'Crédito excluído com sucesso!');
        return redirect()->route('creditos.index');
    }
}
