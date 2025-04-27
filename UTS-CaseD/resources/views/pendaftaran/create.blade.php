@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tambah Pendaftaran Baru</h2>
    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Ada kesalahan input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pendaftaran.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_peserta" class="form-label">Nama Peserta</label>
        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta') }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Peserta</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label for="nama_kursus" class="form-label">Nama Kursus</label>
        <input type="text" name="nama_kursus" class="form-control" value="{{ old('nama_kursus') }}" required>
    </div>

    <div class="mb-3">
        <label for="kategori_kursus" class="form-label">Kategori Kursus</label>
        <input type="text" name="kategori_kursus" class="form-control" value="{{ old('kategori_kursus') }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
    </div>

    <div class="mb-3">
        <label for="status_pendaftaran" class="form-label">Status Pendaftaran</label>
        <select name="status_pendaftaran" class="form-select" required>
            <option value="">-- Pilih Status --</option>
            <option value="terdaftar" {{ old('status_pendaftaran') == 'terdaftar' ? 'selected' : '' }}>Terdaftar</option>
            <option value="aktif" {{ old('status_pendaftaran') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="selesai" {{ old('status_pendaftaran') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="dibatalkan" {{ old('status_pendaftaran') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Pendaftaran</button>
</form>
@endsection
