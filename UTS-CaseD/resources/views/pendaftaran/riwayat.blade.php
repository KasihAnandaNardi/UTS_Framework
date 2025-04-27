@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Riwayat Pendaftaran Dihapus</h2>
    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($pendaftarans->count())
<table class="table table-bordered table-hover">
    <thead class="table-light">
        <tr>
            <th>No</th> <!-- Menambahkan kolom No -->
            <th>Nama Peserta</th>
            <th>Email</th>
            <th>Nama Kursus</th>
            <th>Kategori</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendaftarans as $pendaftaran)
        <tr>
            <td>{{ $loop->iteration + ($pendaftarans->currentPage() - 1) * $pendaftarans->perPage() }}</td> <!-- Menampilkan nomor urut -->
            <td>{{ $pendaftaran->nama_peserta }}</td>
            <td>{{ $pendaftaran->email }}</td>
            <td>{{ $pendaftaran->nama_kursus }}</td>
            <td>{{ $pendaftaran->kategori_kursus }}</td>
            <td>{{ $pendaftaran->tanggal_mulai }}</td>
            <td>{{ $pendaftaran->tanggal_selesai }}</td>
            <td>{{ ucfirst($pendaftaran->status_pendaftaran) }}</td>
            <td class="d-flex">
                <form action="{{ route('pendaftaran.restore', $pendaftaran->id) }}" method="POST" class="me-2" onsubmit="return confirm('Yakin mau pulihkan data ini?')">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                </form>

                <form action="{{ route('pendaftaran.forceDelete', $pendaftaran->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus PERMANEN data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $pendaftarans->links('pagination::bootstrap-5') }}
</div>

@else
    <div class="alert alert-info">Tidak ada pendaftaran yang dihapus.</div>
@endif
@endsection
