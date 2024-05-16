<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Automacao Solfware',
            'description' => 'This is a description for Product 1',
            'price' => 299.99,
            'stock' => 1,
            'status' => true,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'PDV',
            'description' => 'This is a description for Product 2',
            'price' => 379.99,
            'stock' => 5,
            'status' => true,
            'user_id' => 1,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Frontend Vue',
            'description' => 'This is a description for Product 3',
            'price' => 999.99,
            'stock' => 0,
            'status' => false,
            'user_id' => 1,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Frontend React',
            'description' => 'This is a description for Product 4',
            'price' => 999.99,
            'stock' => 0,
            'status' => false,
            'user_id' => 1,
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
