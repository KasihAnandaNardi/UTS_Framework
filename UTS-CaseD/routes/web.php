<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\PendaftaranController;
// Route::get('/', function () {
//     return view('welcome');
// });
 
Route::get('/', fn() => redirect('/pendaftaran'));
Route::resource('pendaftaran', PendaftaranController::class);
Route::get('riwayat-pendaftaran-dihapus', [PendaftaranController::class, 'riwayat'])->name('pendaftaran.riwayat');
Route::post('pendaftaran/restore/{id}', [PendaftaranController::class, 'restore'])->name('pendaftaran.restore');
Route::delete('/pendaftaran/force-delete/{id}', [PendaftaranController::class, 'forceDelete'])->name('pendaftaran.forceDelete');

