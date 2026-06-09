<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTransacaoSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $status = ['Pendente', 'Aprovado', 'Recusado', 'Cancelado', 'Estornado'];

        foreach ($status as $nome) {
            DB::table('status_transacoes')->updateOrInsert(
                ['nome' => $nome],
                ['nome' => $nome]
            );
        }
    }
}
