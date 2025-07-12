<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comodos')->insert([
            ['nome' => 'Sala de Estar', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cozinha', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Quarto Principal', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Banheiro Social', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Área de Serviço', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}