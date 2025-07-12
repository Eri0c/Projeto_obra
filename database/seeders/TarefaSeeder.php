<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            [
                'obra_id' => 1,
                'colaborador_id' => 2,
                'titulo' => 'Instalar tomadas na sala',
                'comodo' => 'Sala de Estar',
                'descricao' => 'Instalar 5 tomadas na parede da TV.',
                'status' => 'em andamento',
                'data_inicio' => '2025-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'obra_id' => 1,
                'colaborador_id' => 2,
                'titulo' => 'Pintar o teto da cozinha',
                'comodo' => 'Cozinha',
                'descricao' => 'Pintar o teto com tinta branca fosca.',
                'status' => 'em espera',
                'data_inicio' => '2025-07-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'obra_id' => 2,
                'colaborador_id' => 2,
                'titulo' => 'Construir parede do quarto',
                'comodo' => 'Quarto Principal',
                'descricao' => 'Construir a parede de drywall do quarto principal.',
                'status' => 'em andamento',
                'data_inicio' => '2025-08-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}