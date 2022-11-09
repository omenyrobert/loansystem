<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ChurchPositions;

class ChurchPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChurchPositions::truncate();

        ChurchPositions::create([
            'position' => 'Senior Pastor'
        ]);
        ChurchPositions::create([
            'position' => 'Assistant Pastor'
        ]);
        ChurchPositions::create([
            'position' => 'Church Elder'
        ]);
        ChurchPositions::create([
            'position' => 'Chair Person'
        ]);
        ChurchPositions::create([
            'position' => 'Assistant Chair Person'
        ]);
        ChurchPositions::create([
            'position' => 'Secretary'
        ]);
        ChurchPositions::create([
            'position' => 'Coordinator'
        ]);
        ChurchPositions::create([
            'position' => 'Member'
        ]);
    }
}
