<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootCategory = [
            'parent_category_id' => 0,
            'name' => 'Без категории',
            'slug' => 'Bez-kategorii',
        ];

        \DB::table('categories')->insert($rootCategory);
    }
}
