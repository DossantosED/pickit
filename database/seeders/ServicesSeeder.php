<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Cambio de Aceite',
            'price' => 1200
        ]);
        DB::table('services')->insert([
            'name' => 'Cambio de Filtro',
            'price' => 2000
        ]);
        DB::table('services')->insert([
            'name' => 'Cambio de Correa',
            'price' => 4300
        ]);
        DB::table('services')->insert([
            'name' => 'Revision General',
            'price' => 8000
        ]);
        DB::table('services')->insert([
            'name' => 'Pintura',
            'price' => 10000
        ]);
        DB::table('services')->insert([
            'name' => 'Otro',
            'price' => 15000
        ]);
    }
}
