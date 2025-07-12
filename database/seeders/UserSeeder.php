<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Responsável Exemplo',
                'email' => 'responsavel@exemplo.com',
                'password' => Hash::make('password'),
                'tipo' => 'responsavel',
                'cpf' => '111.111.111-11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Colaborador Exemplo',
                'email' => 'colaborador@exemplo.com',
                'password' => Hash::make('password'),
                'tipo' => 'colaborador',
                'cpf' => '222.222.222-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
