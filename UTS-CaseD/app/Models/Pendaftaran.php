<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftaran extends Model
{
    use HasFactory, SoftDeletes; //Hasfactory untuk menggunakan factory dan SoftDeletes untuk menghapus data sementara

    /**
     * Kolom-kolom yang boleh diisi massal (fillable).
     */
    protected $fillable = [
        'nama_peserta',
        'email',
        'nama_kursus',
        'kategori_kursus',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_pendaftaran',
    ];

    /**
     * Kolom yang dianggap sebagai tanggal (otomatis di-cast).
     */
    protected $dates = ['deleted_at']; // Ini supaya soft delete berjalan baik
}
