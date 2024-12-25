<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{



    public function run(): void
    {




        \App\Models\Package::create([
            'name' => '1 Month Package',
            'duration_months' => 1,
            'price' => 9.99
        ]);

        \App\Models\Package::create([
            'name' => '3 Month Package',
            'duration_months' => 3,
            'price' => 24.99
        ]);
    }
}
