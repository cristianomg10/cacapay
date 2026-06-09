<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\EmpresaParceira;
use App\Models\StatusTransacao;
use App\Models\Transacao;

class DashboardController extends Controller
{
    public function index()
    {
        $cidadesCount = Cidade::count();
        $clientesCount = Cliente::count();
        $empresasParceirasCount = EmpresaParceira::count();
        $statusTransacoesCount = StatusTransacao::count();
        $transacoesCount = Transacao::count();
        $creditosCount = Credito::count();

        return view('dashboard', compact(
            'cidadesCount',
            'clientesCount',
            'empresasParceirasCount',
            'statusTransacoesCount',
            'transacoesCount',
            'creditosCount'
        ));
    }
}
