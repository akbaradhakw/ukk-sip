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
        student::insert([
            [
                'name' => 'ABU BAKAR TSABIT GHUFRON',
                'nis' => '20389',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '081234567890',
                'email' => 'abu.ghufron@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ADE RAFIF DANESWARA',
                'nis' => '20390',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '082134567891',
                'email' => 'ade.rafif@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ADE ZAIDAN ALTHAF',
                'nis' => '20391',
                'gender' => 'L',
                'address' => 'Tuban',
                'phone' => '083134567892',
                'email' => 'zaidan.althaf@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ADHWA KHALILA RAMADHANI',
                'nis' => '20392',
                'gender' => 'P',
                'address' => 'Sleman',
                'phone' => '084134567893',
                'email' => 'adhwa.ramadhani@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ADNAN FARIS',
                'nis' => '20393',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '085134567894',
                'email' => 'adnan.faris@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'AHMAD HANAFFI RAHMADHANI',
                'nis' => '20394',
                'gender' => 'L',
                'address' => 'Yogyakarta',
                'phone' => '086134567895',
                'email' => 'ahmad.hanaffi@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => "AKBAR AD'HA KUSUMAWARDHANA",
                'nis' => '20395',
                'gender' => 'L',
                'address' => 'Bekasi',
                'phone' => '087134567896',
                'email' => 'akbar.kusuma@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ANDHIKA AUGUST FARNAZ',
                'nis' => '20396',
                'gender' => 'L',
                'address' => 'Brebes',
                'phone' => '088134567897',
                'email' => 'andhika.farnaz@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ANGELINA THITHIS SEKAR LANGIT',
                'nis' => '20397',
                'gender' => 'P',
                'address' => 'Bandar Lampung',
                'phone' => '089134567898',
                'email' => 'angelina.sekar@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ARIFIN NUR IHSAN',
                'nis' => '20398',
                'gender' => 'L',
                'address' => 'Bantul',
                'phone' => '081234567899',
                'email' => 'arifin.ihsan@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ARYA EKA RAHMAT PRASETYO',
                'nis' => '20399',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '082234567800',
                'email' => 'arya.prasetyo@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'ATHIYYA HANIIFA',
                'nis' => '20400',
                'gender' => 'P',
                'address' => 'Sleman',
                'phone' => '083234567801',
                'email' => 'athiyya.haniifa@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'AULIA MAHARANI',
                'nis' => '20401',
                'gender' => 'P',
                'address' => 'Bantul',
                'phone' => '084234567802',
                'email' => 'aulia.maharani@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'BIJAK PUTRA FIRMANSYAH',
                'nis' => '20402',
                'gender' => 'L',
                'address' => 'Pekanbaru',
                'phone' => '085234567803',
                'email' => 'bijak.firmansyah@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'CHRISTIAN JAROT FERDIANNDARU',
                'nis' => '20403',
                'gender' => 'L',
                'address' => 'Yogyakarta',
                'phone' => '086234567804',
                'email' => 'christian.jarot@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'DAFFA ARYA SETA',
                'nis' => '20404',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '087234567805',
                'email' => 'daffa.seta@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'DIMAS BAGUS AHMAD NURYASIN',
                'nis' => '20405',
                'gender' => 'L',
                'address' => 'Sleman',
                'phone' => '088234567806',
                'email' => 'dimas.nuryasin@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'EKALAYA KEMAL PASHA',
                'nis' => '20406',
                'gender' => 'L',
                'address' => 'Yogyakarta',
                'phone' => '089234567807',
                'email' => 'ekalaya.pasha@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'FADLY ATHALLA FAWWAZ',
                'nis' => '20407',
                'gender' => 'L',
                'address' => 'Yogyakarta',
                'phone' => '081334567808',
                'email' => 'fadly.fawwaz@gmail.com',
                'internship_status' => false,
            ],
            [
                'name' => 'FARADILLA SYIFA NUR’AINI',
                'nis' => '20408',
                'gender' => 'P',
                'address' => 'Yogyakarta',
                'phone' => '082334567809',
                'email' => 'faradilla.syifa@gmail.com',
                'internship_status' => false,
            ],
        ]);
    }
}
