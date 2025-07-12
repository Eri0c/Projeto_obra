<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obras')->insert([
            [
                'nome' => 'Reforma Apartamento',
                'descricao' => 'Reforma completa do apartamento 101.',
                'endereco' => 'Rua das Flores, 123',
                'status' => 'em andamento',
                'data_inicio' => '2025-07-01',
                'data_prevista_conclusao' => '2025-12-31',
                'responsavel_id' => 1, // Assumindo que o responsável tem ID 1
                'codigo_acesso' => 'REF-APT-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Construção Casa de Campo',
                'descricao' => 'Construção de uma casa de campo com 3 quartos.',
                'endereco' => 'Estrada do Sol, km 10',
                'status' => 'em espera',
                'data_inicio' => '2025-08-15',
                'data_prevista_conclusao' => '2026-06-30',
                'responsavel_id' => 1, // Assumindo que o responsável tem ID 1
                'codigo_acesso' => 'CASA-CAMPO-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}