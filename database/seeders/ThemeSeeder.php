<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theme::create([
            'site_name'      => 'Mohanlal Sukhadia University',
            'title'          => 'Mohanlal Sukhadia University',
            'logo'           => null,
            'height'         => '100',
            'width'          => '200',
            'head_content'   => '<nav>...</nav>',
            'footer_content' => '<p>© 2026 Mlsu</p>',
        ]);
    }
}
