@extends('layout')

@section('title', 'Edit Pemesanan')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Data Pemesanan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $booking->nama) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Film</label>
            <select name="film" id="filmSelect" class="form-control" required>
                <option value="">-- Pilih Film --</option>
                @foreach ($films as $judul => $jadwalList)
                    <option value="{{ $judul }}" {{ (old('film', $booking->film) == $judul) ? 'selected' : '' }}>
                        {{ $judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jadwal</label>
            <select name="jadwal" id="jadwalSelect" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                @if ($booking->film && isset($films[$booking->film]))
                    @foreach ($films[$booking->film] as $jam)
                        <option value="{{ $jam }}" {{ (old('jadwal', $booking->jadwal) == $jam) ? 'selected' : '' }}>
                            {{ $jam }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jumlah Orang</label>
            <input type="number" name="jumlah_orang" id="jumlahOrang" class="form-control" value="{{ old('jumlah_orang', $booking->jumlah_orang) }}" min="1" required>
        </div>

        <div class="form-group mb-3">
            <label>Total Harga (Rp)</label>
            <input type="text" id="totalHarga" class="form-control" value="{{ $booking->total_harga }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

<script>
    const films = @json($films);
    const hargaPerTiket = 35000;

    const filmSelect = document.getElementById('filmSelect');
    const jadwalSelect = document.getElementById('jadwalSelect');
    const jumlahOrangInput = document.getElementById('jumlahOrang');
    const totalHargaInput = document.getElementById('totalHarga');

    // Update jadwal ketika film diganti
    filmSelect.addEventListener('change', function () {
        const selectedFilm = this.value;
        const jadwals = films[selectedFilm] || [];

        jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';
        jadwals.forEach(jam => {
            const option = document.createElement('option');
            option.value = jam;
            option.textContent = jam;
            jadwalSelect.appendChild(option);
        });
    });

    // Hitung total harga
    function updateHarga() {
        const jumlah = parseInt(jumlahOrangInput.value) || 1;
        totalHargaInput.value = jumlah * hargaPerTiket;
    }

    jumlahOrangInput.addEventListener('input', updateHarga);
    document.addEventListener('DOMContentLoaded', updateHarga);
</script>
@endsection
