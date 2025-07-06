<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        // Gabungkan data film dan jadwalnya di sini
        $films = [
            [
                'title' => '1 Kakak 7 Ponakan',
                'genre' => 'drama',
                'schedule' => ['13:00', '16:00', '20:00'],
                'image' => 'film1.jpeg',  // letakkan gambar di public/images/
            ],
            [
                'title' => 'Perayaan Mati Rasa',
                'genre' => 'drama',
                'schedule' => ['12:00', '15:00', '18:00'],
                'image' => 'film2.jpeg',
            ],
            [
                'title' => 'Agak Laen',
                'genre' => 'komedi',
                'schedule' => ['13:30', '17:00'],
                'image' => 'film3.jpg',
            ],
            [
                'title' => 'Century Girl',
                'genre' => 'romance',
                'schedule' => ['14:00', '19:00'],
                'image' => 'film4.jpg',
            ],
            [
                'title' => 'Lovely Runner',
                'genre' => 'romance',
                'schedule' => ['15:00', '20:00'],
                'image' => 'film5.png',
            ],
            [
                'title' => 'Magic Hour',
                'genre' => 'romance',
                'schedule' => ['21:00', '23:00'],
                'image' => 'magichour.jpeg',
            ],
            [
                'title' => 'Frozen',
                'genre' => 'fiction',
                'schedule' => ['14:30', '18:30'],
                'image' => 'film7.jpg',
            ],
            [
                'title' => 'Dilan 1990',
                'genre' => 'romance',
                'schedule' => ['16:00', '19:30'],
                'image' => 'dilan1990.jpeg',
            ],
        ];

        return view('films.index', compact('films'));
    }
}