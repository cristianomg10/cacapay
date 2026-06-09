<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Credito;
use Illuminate\Support\Facades\DB;

class CreditoService
{
    public function criarCredito(array $data): Credito
    {
        return DB::transaction(function () use ($data) {
            $cliente = Cliente::findOrFail($data['cliente_id']);
            $cliente->increment('saldo', $data['valor']);
            return Credito::create($data);
        });
    }

    public function atualizarCredito(Credito $credito, array $data): Credito
    {
        return DB::transaction(function () use ($credito, $data) {
            $diferenca = $data['valor'] - $credito->valor;

            if ($diferenca != 0) {
                $cliente = Cliente::findOrFail($data['cliente_id']);
                $cliente->increment('saldo', $diferenca);
            }

            $credito->update($data);
            return $credito;
        });
    }

    public function deletarCredito(Credito $credito): void
    {
        DB::transaction(function () use ($credito) {
            $cliente = $credito->cliente;
            $cliente->decrement('saldo', $credito->valor);
            $credito->delete();
        });
    }
}
