<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    private function getFilms()
    {
        return [
            '1 Kakak 7 Ponakan' => ['13:00', '16:00'],
            'Perayaan Mati Rasa' => ['14:00', '17:00'],
            'Agak Laen' => ['15:00', '18:00'],
            'Century Girl' => ['13:30', '19:00'],
            'Lovely Runner' => ['12:00', '20:00'],
            'Cinderella' => ['18:00', '21:00'],
            'Frozen' => ['13:00', '16:00'],
            'Komang' => ['14:30', '17:30'],
        ];
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create($film = null, $jadwal = null)
    {
        $films = $this->getFilms();
        return view('bookings.create', compact('films', 'film', 'jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'film' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        $hargaPerTiket = 35000;
        $totalHarga = $request->jumlah_orang * $hargaPerTiket;

        Booking::create([
            'nama' => $request->nama,
            'film' => $request->film,
            'jadwal' => $request->jadwal,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('home')->with('success', 'Tiket berhasil dipesan!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $films = $this->getFilms(); // tambahkan baris ini
        return view('bookings.edit', compact('booking', 'films'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'film' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        $hargaPerTiket = 35000;
        $totalHarga = $request->jumlah_orang * $hargaPerTiket;

        $booking = Booking::findOrFail($id);
        $booking->update([
            'nama' => $request->nama,
            'film' => $request->film,
            'jadwal' => $request->jadwal,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Data booking berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Data booking berhasil dihapus!');
    }
}