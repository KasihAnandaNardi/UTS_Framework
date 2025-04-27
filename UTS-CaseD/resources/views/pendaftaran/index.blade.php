@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pendaftaran</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Tambah Pendaftaran</a>
        <a href="{{ route('pendaftaran.riwayat') }}" class="btn btn-outline-secondary">Riwayat Pendaftaran</a>
    </div>

    @if ($pendaftarans->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Email</th>
                <th>Nama Kursus</th>
                <th>Kategori</th>
                <th>Tgl Mulai</th>
                <th>Tgl Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftarans as $p)
            <tr>
                <td>{{ $pendaftarans->firstItem() + $loop->iteration - 1 }}</td> <!-- Menampilkan nomor urut -->
                <td>{{ $p->nama_peserta }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->nama_kursus }}</td>
                <td>{{ $p->kategori_kursus }}</td>
                <td>{{ $p->tanggal_mulai }}</td>
                <td>{{ $p->tanggal_selesai }}</td>
                <td>
                @if ($p->status_pendaftaran == 'terdaftar')
                    <span class="badge bg-success">{{ ucfirst($p->status_pendaftaran) }}</span>
                @elseif ($p->status_pendaftaran == 'dibatalkan')
                    <span class="badge bg-danger">{{ ucfirst($p->status_pendaftaran) }}</span>
                @elseif ($p->status_pendaftaran == 'aktif')
                    <span class="badge bg-primary">{{ ucfirst($p->status_pendaftaran) }}</span>
                @elseif ($p->status_pendaftaran == 'selesai')
                    <span class="badge bg-secondary">{{ ucfirst($p->status_pendaftaran) }}</span>
                @else
                    <span class="badge bg-secondary">{{ ucfirst($p->status_pendaftaran) }}</span>
                @endif
            </td>
                <td>
                    <a href="{{ route('pendaftaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pendaftaran.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $pendaftarans->links('pagination::bootstrap-5') }}
    </div>

    @else
        <div class="alert alert-info">Belum ada data pendaftaran.</div>
    @endif

</div>
@endsection
