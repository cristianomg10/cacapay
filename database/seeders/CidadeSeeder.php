<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $cidades = [
            ['nome' => 'Caçador', 'uf' => 'SC'],
        ];

        foreach ($cidades as $cidade) {
            DB::table('cidades')->updateOrInsert(
                ['nome' => $cidade['nome'], 'uf' => $cidade['uf']],
                $cidade
            );
        }
    }
}
