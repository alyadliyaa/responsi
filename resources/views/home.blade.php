@extends('layout')

@section('title', 'Daftar Film')

@section('content')
    <div class="text-center">
        <h2 class="mb-4">Film yang Sedang Tayang</h2>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($films as $film)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $film['image']) }}" class="card-img-top" alt="{{ $film['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film['title'] }}</h5>
                            <p class="card-text">{{ $film['genre'] }}</p>
                            <p><strong>Jadwal:</strong></p>
                            @foreach ($film['schedule'] as $jam)
                                <button class="btn btn-outline-light btn-sm mb-1">{{ $jam }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
