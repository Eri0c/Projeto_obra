<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarefas')->insert([
            [
                'obra_id' => 1, // ID da obra
                'colaborador_id' => 1, // ID do colaborador
                'titulo' => 'Instalação do porcelanato',
                'comodo' => 'Banheiro',
                'descricao' => 'Assentamento de porcelanato no piso do banheiro.',
                'status' => 'em andamento',
                'data_inicio' => Carbon::now()->subDays(2), // Data de início há 2 dias
                'data_fim' => null, // Ainda não concluída
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'obra_id' => 1,
                'colaborador_id' => 2,
                'titulo' => 'Pintura das paredes',
                'comodo' => 'Quarto',
                'descricao' => 'Pintura das paredes com tinta acrílica branca.',
                'status' => 'em espera',
                'data_inicio' => Carbon::now(),
                'data_fim' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'obra_id' => 2,
                'colaborador_id' => 3,
                'titulo' => 'Instalação elétrica',
                'comodo' => 'Sala',
                'descricao' => 'Fiação e instalação de luminárias LED no teto.',
                'status' => 'concluída',
                'data_inicio' => Carbon::now()->subDays(5),
                'data_fim' => Carbon::now()->subDays(1), // Concluída há 1 dia
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        // Seeder para Obras
        DB::table('obras')->insert([
            ['id' => 1, 'nome' => 'Obra A'],
            ['id' => 2, 'nome' => 'Obra B'],
        ]);

        // Seeder para Colaboradores
        DB::table('colaborador')->insert([
            ['id' => 1, 'nome' => 'João'],
            ['id' => 2, 'nome' => 'Maria'],
            ['id' => 3, 'nome' => 'Carlos'],
        ]);
    }
}
