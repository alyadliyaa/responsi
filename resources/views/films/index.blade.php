@extends('layout')

@section('title', 'Daftar Film')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Daftar Film</h2>

    <div class="row justify-content-center">
        @foreach ($films as $film)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('images/' . $film['image']) }}" class="card-img-top" alt="{{ $film['title'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $film['title'] }}</h5>
                    <p class="card-text"><strong>Genre:</strong> {{ $film['genre'] }}</p>
                    <p><strong>Jadwal:</strong></p>
                    <div>
                        @foreach ($film['schedule'] as $jam)
                            <a href="{{ url('/booking/' . $film['title'] . '/' . $jam) }}" class="btn btn-outline-primary btn-sm m-1">
                                {{ $jam }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
