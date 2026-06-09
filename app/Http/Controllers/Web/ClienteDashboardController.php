<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Transacao;
use Carbon\Carbon;

class ClienteDashboardController extends Controller
{
    public function dashboard()
    {
        $cliente = auth('cliente')->user();

        $transacoesRecentes = Transacao::where('cliente_id', $cliente->id)
            ->with(['empresaParceira', 'statusTransacao'])
            ->orderBy('data', 'desc')
            ->take(10)
            ->get();

        $totalTransacoes = Transacao::where('cliente_id', $cliente->id)->count();

        $pagamentosMes = Transacao::where('cliente_id', $cliente->id)
            ->whereMonth('data', Carbon::now()->month)
            ->whereYear('data', Carbon::now()->year)
            ->sum('valor');

        return view('cliente.dashboard', compact('cliente', 'transacoesRecentes', 'totalTransacoes', 'pagamentosMes'));
    }

    public function extrato()
    {
        $cliente = auth('cliente')->user();

        $transacoes = Transacao::where('cliente_id', $cliente->id)
            ->with(['empresaParceira', 'statusTransacao'])
            ->orderBy('data', 'desc')
            ->paginate(15);

        return view('cliente.extrato', compact('cliente', 'transacoes'));
    }
}
