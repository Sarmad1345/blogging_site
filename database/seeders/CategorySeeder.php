<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Category::create([
            'name' => 'Personal & Daily Life'
        ]);
        Category::create([
            'name' => 'Travel & Adventure'
        ]);
        Category::create([
            'name' => 'Parenting & Family:'
        ]);
        Category::create([
            'name' => 'Food & Recipes'
        ]);
        Category::create([
            'name' => 'Health & Fitness'
        ]);
        Category::create([
            'name' => 'Fashion & Beauty'
        ]);

        Category::create([
            'name' => 'Entertainment & Culture'
        ]);
        Category::create([
            'name' => 'Sports & Athletics'
        ]);
    }
}
