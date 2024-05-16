<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_user')->insert([
            'user_id' => 1,
            'product_id' => 2
        ]);

        DB::table('product_user')->insert([
            'user_id' => 1,
            'product_id' => 1

        ]);

        DB::table('product_user')->insert([
            'user_id' => 2,
            'product_id' => 3

        ]);

        DB::table('product_user')->insert([
            'user_id' => 2,
            'product_id' => 4

        ]);

        DB::table('product_user')->insert([
            'user_id' => 2,
            'product_id' => 1

        ]);


        DB::table('product_user')->insert([
            'user_id' => 3,
            'product_id' => 1

        ]);

        DB::table('product_user')->insert([
            'user_id' => 4,
            'product_id' => 4

        ]);
        DB::table('product_user')->insert([
            'user_id' => 4,
            'product_id' => 1

        ]);
    }
}
