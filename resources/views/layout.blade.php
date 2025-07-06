<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Nonton Yuk!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #1a1a2e;
            color: white;
        }

        .card {
            background-color: #16213e;
            border: none;
        }

        .card-title, .card-text {
            color: #e0e0e0;
        }

        .navbar {
            background-color: #0f3460 !important;
        }

        .btn {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    {{-- Navbar (bisa juga ditaruh di halaman yang pakai layout) --}}
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
        <a class="btn btn-light me-2" href="#">Home</a>
        <a class="btn btn-outline-light" href="#">Lihat Daftar Pemesanan</a>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
