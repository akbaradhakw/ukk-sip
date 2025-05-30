<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\industries;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        industries::create([
            'name' => 'Industry ',
            'business_fields' => 'Field ',
            'address' => 'Jl. Contoh No. ',
            'phone' => '08123456789',
            'email' => 'industry@example.com',
            ''
        ]);
    }
}
