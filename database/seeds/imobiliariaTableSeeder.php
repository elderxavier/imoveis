<?php

use Illuminate\Database\Seeder;

class imobiliariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imobiliaria')->insert([

                [
                    'name' => 'imobiliaria 1',
                    'description' => 'imobiliaria',                    
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'imobiliaria 2',
                    'description' => 'imobiliaria',                    
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'imobiliaria 3',
                    'description' => 'imobiliaria',                    
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);
    
    }
}
