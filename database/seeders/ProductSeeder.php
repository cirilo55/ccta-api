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
            'name' => 'Product 1',
            'description' => 'This is a description for Product 1',
            'price' => 99.99,
            'stock' => 10,
            'status' => 'available',
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Product 2',
            'description' => 'This is a description for Product 2',
            'price' => 79.99,
            'stock' => 5,
            'status' => 'available',
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
