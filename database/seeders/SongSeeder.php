<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Song::factory()->count(10)->create([
            'title' => 'Sample Song Title',
            'lyrics' => 'These are the sample lyrics for the song.',
            'composer' => 'Sample Composer',
            'arranger' => 'Sample Arranger',
        ]);
    }
}