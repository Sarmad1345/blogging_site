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
        $category = [
            ['name' => 'Technology & Gadgets'],
            ['name' => 'Fashion & Beauty'],
            ['name' => 'Health & Wellness'],
            ['name' => 'Travel & Adventure'],
            ['name' => 'Food & Recipes'],
            ['name' => 'Lifestyle & Personal Development'],
            ['name' => 'Business & Entrepreneurship'],
            ['name' => 'Entertainment & Pop Culture'],
            ['name' => 'Sports & Fitness'],
            ['name' => 'Education & Learning']
        ];

        foreach ($category as  $value) {
            Category::create($value);
        }
    }
}
