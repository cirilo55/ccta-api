<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Frontend',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('categories')->insert([
            'name' => 'Backend',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Laravel',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Vue',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'React.js',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Python',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('categories')->insert([
            'name' => 'Geracao de Relatorios',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Gateways de pagamentos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
