<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pendaftaran;

class PendaftaranFactory extends Factory
{
    protected $model = Pendaftaran::class;
    public function definition(): array
    {
        $status = ['terdaftar', 'aktif', 'selesai', 'dibatalkan'];
        $tanggalMulai = $this->faker->dateTimeBetween('2023-01-01', '2023-01-30');
        $tanggalSelesai = $this->faker->dateTimeBetween($tanggalMulai, '+6 months'); 
        return [
            'nama_peserta' => $this->faker->name(),
            'email' => $this->faker->email(),
            'nama_kursus' => $this->faker->word() . ' Course',
            'kategori_kursus' => $this->faker->randomElement(['Teknologi', 'Bisnis', 'Bahasa', 'Seni']),
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'status_pendaftaran' => $this->faker->randomElement($status),
        ];
    }
    
}
