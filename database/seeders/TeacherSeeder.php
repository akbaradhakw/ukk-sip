<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\teacher;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $guruRole = Role::firstOrCreate(['name' => 'teacher']);

        teacher::create([
            'name' => 'kaleg', // ambil dari user
            'nip' => '6969',
            'gender' => 'L',
            'address' => 'Jl. Pendidikan No. 12',
            'phone' => '08123456789',
            'email' => 'kaleg@sija.com',
        ]);
    }
}
