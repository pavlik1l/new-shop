<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 5; $i < 11; $i++) {
            DB::table('product_images')->insert([
                'img' => 'product_' . $i . '.jpg',
                'product_id' => $i
            ]);
        }
    }
}
