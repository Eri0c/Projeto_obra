<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_tarefa')->insert([
            ['nome' => 'Instalação Elétrica', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Pintura', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Alvenaria', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Hidráulica', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Marcenaria', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}