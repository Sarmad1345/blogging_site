<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeedeer extends Seeder
{

    public function run(): void
    {
        $tags = [
            ['name' => 'Technology'],
            ['name' => 'Fashion'],
            ['name' => 'Health'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
        ];
        foreach ($tags as $tag) {
            $tag['slug'] = Str::slug($tag['name']);
            Tag::create([
                'name' => $tag['name'],
                'slug' => $tag['slug'],
            ]);
        }
    }
}
