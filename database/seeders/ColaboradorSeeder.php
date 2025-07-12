<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaboradors')->insert([
            [
                'user_id' => 2, // ID do usuário 'Colaborador Exemplo'
                'telefone' => '11987654321',
                'cpf' => '222.222.222-22',
                'endereco' => 'Rua dos Colaboradores, 10',
                'especialidade' => 'Eletricista',
                'codigo' => 'COLAB-001',
                'status' => 'ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // ID do usuário 'Responsável Exemplo'
                'telefone' => '21912345678',
                'cpf' => '111.111.111-11',
                'endereco' => 'Avenida Principal, 200',
                'especialidade' => 'Pintora',
                'codigo' => 'COLAB-002',
                'status' => 'ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
