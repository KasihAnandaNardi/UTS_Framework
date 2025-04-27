<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran; // Import Model Pendaftaran
use App\Http\Controllers\Controller; // Ini opsional sebenarnya, karena sudah di dalam Controller
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Menampilkan semua data pendaftaran
    public function index()
    {
        $pendaftarans = Pendaftaran::orderBy('created_at',"desc")->paginate(10);
        return view('pendaftaran.index', compact('pendaftarans'));
    }
    
    // Menampilkan form untuk membuat pendaftar baru
    public function create()
    {
        return view('pendaftaran.create');
    }
    
    // Menyimpan data pendaftaran baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email',
            'nama_kursus' => 'required|string',
            'kategori_kursus' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status_pendaftaran' => 'required|in:terdaftar,aktif,selesai,dibatalkan',
        ]);
    
        // Simpan ke database
        Pendaftaran::create($validated);

        // Redirect kembali ke halaman daftar pendaftaran
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan!');
    }
    
    // Menampilkan form edit untuk pendaftaran tertentu
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.edit', compact('pendaftaran'));
    }
    
    // Update data pendaftaran yang dipilih
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email',
            'nama_kursus' => 'required|string',
            'kategori_kursus' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status_pendaftaran' => 'required|in:terdaftar,aktif,selesai,dibatalkan',
        ]);
    
        // Update ke database
        $pendaftaran->update($validated);

        // / Redirect kembali ke halaman daftar pendaftaran
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran diperbarui!');
    }
    
    // Soft delete data pendaftaran (tidak dihapus permanen)
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran dihapus!');
    }
    
    // Menampilkan daftar pendaftaran yang sudah dihapus (soft delete)
    public function riwayat()
    {
        $pendaftarans = Pendaftaran::onlyTrashed()->paginate(10);
        return view('pendaftaran.riwayat', compact('pendaftarans'));
    }
    
    // Restore (mengembalikan) data pendaftaran yang terhapus
    public function restore($id)
    {
        Pendaftaran::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('pendaftaran.riwayat')->with('success', 'Pendaftaran dipulihkan!');
    }

    //menghapus permanen data pendaftaran yang masuk ke riwayat hapus
    public function forceDelete($id)
{
    $pendaftaran = Pendaftaran::onlyTrashed()->findOrFail($id);
    $pendaftaran->forceDelete();

    // Redirect kembali ke halaman riwayat pendaftaran
    return redirect()->route('pendaftaran.riwayat')->with('success', 'Pendaftaran dihapus permanen!');
}

}
