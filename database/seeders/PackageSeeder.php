<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        Package::create([
            'name' => 'Basic Plan',
            'description' => 'A basic plan with limited features.',
            'price' => 9.99,
            'duration' => 30, // 30 days
            'features' => ['Access to basic content', 'Email support'],
            'status' => 'active'
        ]);

        Package::create([
            'name' => 'Standard Plan',
            'description' => 'A standard plan for regular users.',
            'price' => 19.99,
            'duration' => 60, // 60 days
            'features' => ['Access to standard content', 'Priority email support', 'Monthly updates'],
            'status' => 'active'
        ]);

        Package::create([
            'name' => 'Premium Plan',
            'description' => 'A premium plan with all features included.',
            'price' => 29.99,
            'duration' => 90, // 90 days
            'features' => ['Access to all content', '24/7 support', 'Weekly updates', 'Exclusive resources'],
            'status' => 'active'
        ]);

        Package::create([
            'name' => 'Archived Plan',
            'description' => 'A legacy plan no longer available for new users.',
            'price' => 5.99,
            'duration' => 15, // 15 days
            'features' => ['Limited content access'],
            'status' => 'archived'
        ]);
    }
}
