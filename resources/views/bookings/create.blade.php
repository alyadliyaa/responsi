@extends('layout')

@section('title', 'Pesan Tiket')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Form Pemesanan Tiket</h2>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Film</label>
            <select name="film" id="filmSelect" class="form-control" required>
                <option value="">-- Pilih Film --</option>
                @foreach ($films as $judul => $jadwalList)
                    <option value="{{ $judul }}" {{ (old('film', $film) == $judul) ? 'selected' : '' }}>{{ $judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jadwal</label>
            <select name="jadwal" id="jadwalSelect" class="form-control" required>
                <option value="">-- Pilih Jadwal --</option>
                @if (($filmOld = old('film', $film)) && isset($films[$filmOld]))
                    @foreach ($films[$filmOld] as $jam)
                        <option value="{{ $jam }}" {{ (old('jadwal', $jadwal) == $jam) ? 'selected' : '' }}>{{ $jam }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jumlah Orang</label>
            <input type="number" name="jumlah_orang" id="jumlahOrang" class="form-control" min="1" value="{{ old('jumlah_orang', 1) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Total Harga (Rp)</label>
            <input type="text" id="totalHarga" class="form-control" value="35000" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Pesan</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    const films = @json($films);
    const filmSelect = document.getElementById('filmSelect');
    const jadwalSelect = document.getElementById('jadwalSelect');

    filmSelect.addEventListener('change', function () {
        const selectedFilm = this.value;
        const jadwals = films[selectedFilm] || [];

        jadwalSelect.innerHTML = '<option value="">-- Pilih Jadwal --</option>';
        jadwals.forEach(jadwal => {
            const option = document.createElement('option');
            option.value = jadwal;
            option.textContent = jadwal;
            jadwalSelect.appendChild(option);
        });
    });

    const hargaPerTiket = 35000;
    const jumlahOrangInput = document.getElementById('jumlahOrang');
    const totalHargaInput = document.getElementById('totalHarga');

    function updateHarga() {
        const jumlah = parseInt(jumlahOrangInput.value) || 1;
        totalHargaInput.value = jumlah * hargaPerTiket;
    }

    jumlahOrangInput.addEventListener('input', updateHarga);
    document.addEventListener('DOMContentLoaded', updateHarga);
</script>
@endsection