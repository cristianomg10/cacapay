<?php

namespace App\Services;

use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\EmpresaParceira;
use App\Models\StatusTransacao;
use App\Models\Transacao;
use Illuminate\Support\Facades\DB;

class TransacaoService
{
    public function realizarCompra(array $data): Transacao
    {
        return DB::transaction(function () use ($data) {
            $cliente = Cliente::where('cpf', $data['cpf'])->first();

            if (!$cliente) {
                $cidadePadrao = Cidade::firstOrCreate(
                    ['nome' => 'Não Informada'],
                    ['uf' => 'NA']
                );

                $cliente = Cliente::create([
                    'nome' => $data['nome'],
                    'cpf' => $data['cpf'],
                    'email' => $data['email'],
                    'telefone' => '00000000000',
                    'senha' => bcrypt('senha123'),
                    'numero_conta' => 'CONTA-' . uniqid(),
                    'saldo' => 50.00,
                    'cidade_id' => $cidadePadrao->id,
                ]);
            }

            if ($cliente->saldo < $data['valor']) {
                throw new \RuntimeException('Saldo insuficiente.');
            }

            $empresa = EmpresaParceira::where('token_acesso', $data['token'])->firstOrFail();
            $status = StatusTransacao::where('nome', 'Aprovado')->firstOrFail();

            $cliente->decrement('saldo', $data['valor']);
            $empresa->increment('saldo', $data['valor']);

            return Transacao::create([
                'cliente_id' => $cliente->id,
                'empresa_parceira_id' => $empresa->id,
                'valor' => $data['valor'],
                'status_id' => $status->id,
                'data' => now(),
            ]);
        });
    }

    public function criarTransacao(array $data): Transacao
    {
        return DB::transaction(function () use ($data) {
            $cliente = Cliente::findOrFail($data['cliente_id']);
            $empresa = EmpresaParceira::findOrFail($data['empresa_parceira_id']);

            if ($cliente->saldo < $data['valor']) {
                throw new \RuntimeException('Saldo insuficiente.');
            }

            $cliente->decrement('saldo', $data['valor']);
            $empresa->increment('saldo', $data['valor']);

            return Transacao::create($data);
        });
    }

    public function atualizarTransacao(Transacao $transacao, array $data): Transacao
    {
        return DB::transaction(function () use ($transacao, $data) {
            $diferenca = $data['valor'] - $transacao->valor;

            if ($diferenca != 0) {
                $cliente = Cliente::findOrFail($data['cliente_id']);
                $empresa = EmpresaParceira::findOrFail($data['empresa_parceira_id']);

                if ($diferenca > 0 && $cliente->saldo < $diferenca) {
                    throw new \RuntimeException('Saldo insuficiente.');
                }

                $cliente->decrement('saldo', $diferenca);
                $empresa->increment('saldo', $diferenca);
            }

            $transacao->update($data);
            return $transacao;
        });
    }

    public function deletarTransacao(Transacao $transacao): void
    {
        DB::transaction(function () use ($transacao) {
            $cliente = $transacao->cliente;
            $empresa = $transacao->empresaParceira;

            if ($cliente) {
                $cliente->increment('saldo', $transacao->valor);
            }

            if ($empresa) {
                $empresa->decrement('saldo', $transacao->valor);
            }

            $transacao->delete();
        });
    }
}
