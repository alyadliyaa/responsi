<h3>Jadwal:</h3>
<ul>
    @foreach ($film['schedule'] as $jam)
        <li>
            <a href="/booking/{{ $film['title'] }}/{{ $jam }}">
                {{ $jam }} - Pesan Tiket
            </a>
        </li>
    @endforeach
</ul>