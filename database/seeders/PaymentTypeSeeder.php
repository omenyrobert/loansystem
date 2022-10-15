<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::truncate();
        
        PaymentType::create([
            'type' => 'Missed'
        ]);

        PaymentType::create([
            'type' => 'Rescheduled'
        ]);

        PaymentType::create([
            'type' => 'Normal'
        ]);

        PaymentType::create([
            'type' => 'Personal Loan'
        ]);

        PaymentType::create([
            'type' => 'Fine'
        ]);
    }
}
