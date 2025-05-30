<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        student::create([
            'name' => 'yanto', // ambil dari user
            'nis' => '20334',
            'gender' => 'L',
            'address' => 'Jl. Pendidikan No. 12',
            'phone' => '08123456789',
            'email' => 'yanto@ganti.com',
        ]);
    }
}
