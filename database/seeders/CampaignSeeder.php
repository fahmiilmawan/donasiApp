<?php

namespace Database\Seeders;

use App\Models\Campaign;
use COM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'judul' => 'Bantuan untuk Anak Yatim',
            'deskripsi' => 'Mengumpulkan dana untuk membantu anak-anak yatim di daerah terpencil.',
            'target_donasi' => 5000000,
            'donasi_terkumpul' => 1500000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',

        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Korban Bencana Alam',
            'deskripsi' => 'Mengumpulkan dana untuk membantu korban bencana alam di daerah terdampak.',
            'target_donasi' => 10000000,
            'donasi_terkumpul' => 5000000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pendidikan Anak',
            'deskripsi' => 'Mengumpulkan dana untuk membantu biaya pendidikan anak-anak di daerah terpencil.',
            'target_donasi' => 20000000,
            'donasi_terkumpul' => 10000000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pengobatan Pasien',
            'deskripsi' => 'Mengumpulkan dana untuk membantu biaya pengobatan pasien yang membutuhkan.',
            'target_donasi' => 5000000,
            'donasi_terkumpul' => 3000000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pemeliharaan Hutan',
            'deskripsi' => 'Mengumpulkan dana untuk membantu pemeliharaan hutan di daerah terpencil.',
            'target_donasi' => 10000000,
            'donasi_terkumpul' => 5000000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pembangunan Masjid',
            'deskripsi' => 'Mengumpulkan dana untuk membantu pembangunan masjid di daerah terpencil.',
            'target_donasi' => 5000000,
            'donasi_terkumpul' => 2500000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pembangunan Sekolah',
            'deskripsi' => 'Mengumpulkan dana untuk membantu pembangunan sekolah di daerah terpencil.',
            'target_donasi' => 10000000,
            'donasi_terkumpul' => 5000000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);

        Campaign::create([
            'judul' => 'Bantuan untuk Pembangunan Rumah Sakit',
            'deskripsi' => 'Mengumpulkan dana untuk membantu pembangunan rumah sakit di daerah terpencil.',
            'target_donasi' => 5000000,
            'donasi_terkumpul' => 2500000,
            'tanggal_dimulai' => '2023-01-01',
            'tanggal_berakhir' => '2023-12-31',
        ]);
    }
}
