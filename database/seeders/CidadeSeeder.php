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
            ['nome' => 'São Paulo', 'uf' => 'SP'],
            ['nome' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['nome' => 'Belo Horizonte', 'uf' => 'MG'],
            ['nome' => 'Brasília', 'uf' => 'DF'],
            ['nome' => 'Salvador', 'uf' => 'BA'],
            ['nome' => 'Fortaleza', 'uf' => 'CE'],
            ['nome' => 'Curitiba', 'uf' => 'PR'],
            ['nome' => 'Manaus', 'uf' => 'AM'],
            ['nome' => 'Recife', 'uf' => 'PE'],
            ['nome' => 'Porto Alegre', 'uf' => 'RS'],
        ];

        foreach ($cidades as $cidade) {
            DB::table('cidades')->updateOrInsert(
                ['nome' => $cidade['nome'], 'uf' => $cidade['uf']],
                $cidade
            );
        }
    }
}
