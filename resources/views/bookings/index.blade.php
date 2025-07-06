@extends('layout')

@section('title', 'Daftar Pemesanan')

@section('content')
<h2 class="text-center mb-4">Daftar Pemesanan Tiket</h2>

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jumlah Orang</th>
            <th>Total Harga</th>
            <th>Film</th>
            <th>Jadwal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ $booking->nama }}</td>
                <td>{{ $booking->jumlah_orang }}</td>
                <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>

                <td>{{ $booking->film }}</td>
                <td>{{ $booking->jadwal }}</td>
                <td>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada data pemesanan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('bookings.create') }}" class="btn btn-success mt-3">Pesan Tiket Baru</a>
<a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Home</a>
@endsection
