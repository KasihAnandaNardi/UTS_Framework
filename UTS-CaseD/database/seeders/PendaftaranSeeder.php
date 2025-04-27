<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 30 data dummy menggunakan factory untuk model Pendaftaran
        Pendaftaran::factory()->count(30)->create();
    }
}
