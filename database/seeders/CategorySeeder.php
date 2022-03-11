<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Smartphones', 'Camera', 'Notebooks'];
        $inc = 1;
        foreach($categories as $cat) {
            DB::table('categories')->insert([
                'title' => $cat,
                'description' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона',
                'image' => 'product_' . $inc . '.jpg',
                'alias' => mb_strtolower($cat)
            ]);
            $inc++;
        }
    }
}
