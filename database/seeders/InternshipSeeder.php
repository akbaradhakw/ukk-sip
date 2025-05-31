<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\industry;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        industry::insert([
            [
                'name' => 'PT Aksa Digital Group',
                'business_fields' => 'IT Service and IT Consulting (Information Technology Company)',
                'address' => 'Jl. Wongso Permono No.26, Klidon, Sukoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581',
                'phone' => '08982909000',
                'email' => 'aksa@gmail.com',
                'website' => 'https://aksa.id/',
            ],
            [
                'name' => 'PT. Gamatechno Indonesia',
                'business_fields' => 'Penyedia layanan, solusi, dan produk inovasi teknologi informasi serta holding company yang melahirkan startup di bidang teknologi informasi.',
                'address' => 'Jl. Purwomartani, Karangmojo, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'phone' => '0274-5044044',
                'email' => 'info@gamatechno.com',
                'website' => 'https://www.gamatechno.com/',
            ],
            [
                'name' => 'CV. Karya Hidup Sentosa',
                'business_fields' => 'Alat pertanian',
                'address' => 'Jl. Magelang KM.8,8, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285',
                'phone' => '0274-512095',
                'email' => 'quick@gmail.com',
                'website' => 'https://www.quick.co.id/',
            ],

            // Data tambahan dari sim.stembayo.sch.id
            [
                'name' => 'PT. Gagas Anagata Nusantara',
                'business_fields' => 'Manufaktur / Permesinan / Otomatisasi',
                'address' => 'Jalan Dworowati No.11 Nglarang, Malangrejo, Wedomartani, Ngemplak, Sleman, DIY',
                'phone' => '0274-963966',
                'email' => 'info@ichibot.id',
                'website' => 'https://ichibot.id',
            ],
            [
                'name' => 'PT. Pura Barutama Kudus (Pura Group)',
                'business_fields' => 'Plastik / Karet / Kertas / Kimia',
                'address' => 'Jl. Kresna, Jatimulyo, Jati Wetan, Kec. Jati, Kab. Kudus, Jawa Tengah 59346',
                'phone' => '+62 291 444361',
                'email' => 'info@puragroup.com',
                'website' => 'https://www.puragroup.com/id/kemasan-cetak-offset/',
            ],
            [
                'name' => 'PT. Saraswanti Indo Genetech',
                'business_fields' => 'Pengolahan Limbah / Manajemen Lingkungan',
                'address' => 'Jl. Rasamala, Ring Road Taman Yasmin No.20, Curugmekar, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113',
                'phone' => '+62 251 7532 348',
                'email' => 'info@siglaboratory.com',
                'website' => 'https://siglaboratory.com/id/',
            ],
            [
                'name' => 'PT. Kencana Gemilang (Miyako)',
                'business_fields' => 'Peralatan Elektronik',
                'address' => 'Jl. Raya Serang KM. RW.8, Talaga, Kec. Cikupa, Kab. Tangerang, Banten 15710',
                'phone' => '(021) 5960204',
                'email' => 'info@miyako.co.id',
                'website' => 'https://miyako.co.id',
            ],
            [
                'name' => 'PT. Solunova Alami Indonesia',
                'business_fields' => 'Plastik / Karet / Kertas / Kimia',
                'address' => 'KIK, Jl. Indraprasta No.9, Tambak, Wonorejo, Kec. Kaliwungu, Kab. Kendal, Jawa Tengah 51372',
                'phone' => '+6224 3000 9999',
                'email' => 'info@solunova.co.id',
                'website' => 'https://www.solunova.co.id/',
            ],
            [
                'name' => 'Taruna Motor - General Repair dan Body Repair',
                'business_fields' => 'Kendaraan Bermotor / Ban / Otomotif',
                'address' => 'Jl. Gito Gati, Banaran, Tridadi, Sleman',
                'phone' => '0813-2904-1228',
                'email' => 'info@tm_tarunamotor.id',
                'website' => 'https://tm_tarunamotor.id',
            ],
        ]);
    }
}
