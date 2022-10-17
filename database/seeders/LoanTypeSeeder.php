<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\LoanType;

class LoanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanType::truncate();

        LoanType::create([
            'type' => 'Boda Boda'
        ]);

        LoanType::create([
            'type' => 'Personal'
        ]);
    }
}
