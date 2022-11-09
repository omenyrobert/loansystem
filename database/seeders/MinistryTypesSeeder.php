<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MinistryTypes;

class MinistryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MinistryTypes::truncate();
        
        MinistryTypes::create([
            'ministry' => 'Pastoral'
        ]);

        MinistryTypes::create([
            'ministry' => 'Worship Band'
        ]);

        MinistryTypes::create([
            'ministry' => 'Men Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Women Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Children Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Youth Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Intercessor Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Usher Ministry'
        ]);

        MinistryTypes::create([
            'ministry' => 'Married Ministry'
        ]);
        MinistryTypes::create([
            'ministry' => 'Staff'
        ]);
    }
}
