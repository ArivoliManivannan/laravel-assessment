<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['name' => 'Product 1', 'price' => 100.00, 'description' => 'Description of Product 1'],
            ['name' => 'Product 2', 'price' => 150.00, 'description' => 'Description of Product 2'],
            ['name' => 'Product 3', 'price' => 200.00, 'description' => 'Description of Product 3'],
        ]);
    }
}
