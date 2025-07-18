<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CardDesignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designs = [
            [
                'name' => 'Classic Blue',
                'preview_image_url' => 'https://example.com/images/classic-blue.jpg',
                'css_class' => 'card-design-classic-blue',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Modern Gradient',
                'preview_image_url' => 'https://example.com/images/modern-gradient.jpg',
                'css_class' => 'card-design-modern-gradient',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Minimalist White',
                'preview_image_url' => 'https://example.com/images/minimalist-white.jpg',
                'css_class' => 'card-design-minimalist-white',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dark Theme',
                'preview_image_url' => 'https://example.com/images/dark-theme.jpg',
                'css_class' => 'card-design-dark-theme',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('card_designs')->insert($designs);
    }
}
