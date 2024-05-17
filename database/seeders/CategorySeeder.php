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
            'product_id' => 3,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('categories')->insert([
            'name' => 'Backend',
            'product_id' => 2,

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Laravel',
            'product_id' => 1,

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Vue',
            'product_id' => 3,

            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'name' => 'React.js',
            'product_id' => 4,

            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
