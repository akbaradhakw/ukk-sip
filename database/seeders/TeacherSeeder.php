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
        $gurus = teacher::insert([
            [
                'name' => 'Sugiarto, ST', 
                'nip' => '197203172005011012',
                'gender' => 'L',
                'address' => 'Klaten',
                'phone' => '085643188811',
                'email' => 'mrantazy68@gmail.com'
            ],
            [
                'name' => 'Yunianto Hermawan, S.Kom', 
                'nip' => '197306202006041005',
                'gender' => 'L',
                'address' => 'Klaten',
                'phone' => '081548734649',
                'email' => 'yuniantohermawan@gmail.com'
            ],
            [
                'name' => 'Eka Nur Ahmad Romadhoni, S.Pd.', 
                'nip' => '199303012019031011',
                'gender' => 'L',
                'address' => 'Klaten',
                'phone' => '085895780078',
                'email' => 'eka.html@gmail.com'
            ],
            [
                'name' => 'M. Endah Titisari, ST', 
                'nip' => '197403022006042008',
                'gender' => 'P',
                'address' => 'Pokoh, Maguwo',
                'phone' => '085608990027',
                'email' => 'mareta.susend@gmail.com'
            ],
            [
                'name' => 'Rr. Retna Trimantaraningsih, ST', 
                'nip' => '197006272021212002',
                'gender' => 'P',
                'address' => 'Denggung',
                'kontak' => '0856436402427',
                'email' => 'rereningsihlarose@gmail.com'
            ],
            [
                'name' => 'Ratna Yunita Sari, ST', 
                'nip' => '197107082022211003',
                'gender' => 'P',
                'address' => 'Gendeng Kidul',
                'phone' => '085228771506',
                'email' => 'ratnayu2014@gmail.com'
            ],
        ]);
    }
}
