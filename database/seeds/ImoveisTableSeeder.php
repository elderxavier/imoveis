<?php

use Illuminate\Database\Seeder;

class ImoveisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imoveis')->insert([

                [
                    'imobiliaria' => 'imobiliaria 1',
                    'type' => 'casa',
                    'description' => 'Casa 5 comodos, 2 suites',
                    'adress' => 'Rua Francisco Bueno Luiz, São Paulo - SP',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'imobiliaria' => 'imobiliaria 2',
                    'type' => 'casa',
                    'description' => 'Casa 3 comodos',
                    'adress' => 'Rua Agostinha de Souza Monteiro, São Paulo - SP',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'imobiliaria' => 'imobiliaria 2',
                    'type' => 'apartamento',
                    'description' => 'apartamento 3 comodos',
                    'adress' => 'Av Faria Lima, São Paulo - SP',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);
    }
}
