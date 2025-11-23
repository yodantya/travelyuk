<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ManajemenRute;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManajemenRute::insert([
            [
                'kota_asal' => 'Bandung',
                'kota_tujuan' => 'Jakarta',
                'tanggal_berangkat' => '2025-01-10',
                'jam_berangkat' => '08:00',
                'harga' => 125000,
                'jumlah_kursi' => 10,
            ],
            [
                'kota_asal' => 'Jakarta',
                'kota_tujuan' => 'Bandung',
                'tanggal_berangkat' => '2025-01-10',
                'jam_berangkat' => '14:00',
                'harga' => 125000,
                'jumlah_kursi' => 10,
            ],
            [
                'kota_asal' => 'Cirebon',
                'kota_tujuan' => 'Jakarta',
                'tanggal_berangkat' => '2025-01-11',
                'jam_berangkat' => '07:00',
                'harga' => 150000,
                'jumlah_kursi' => 10,
            ],
        ]);
    }
}
