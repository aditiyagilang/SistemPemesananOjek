<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/logos/logo.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logos/logo.png">
    <title>
        Angkutan Wisata
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Pemanggilan CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-i+3F5KP4q+uAnZyQyRwvve0fS6+BiUm8KG6rvYDz3sVJHBn+Xo1/iu6UKhtWigkAs3PUdU5coU59g5+JsZap5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Pemanggilan Font Google -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<!-- Pemanggilan Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
<style>
    .nav-link-custom {
        font-size: 20px;
        font-weight: 900;
    }
</style>
<style>
    .social-icons-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .social-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #505752;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 10px;
        color: white;
    }

    .logo-img {
        max-height: 50px;
        /* Atur tinggi maksimum logo */
        margin-right: 20px;
        /* Atur jarak antara logo dan menu */
    }

    .profile-img {
        margin-left: 20px;
        /* Atur jarak antara gambar profil dan menu */
    }

    .dropdown-toggle::after {
        border-top-color: white !important;
        /* Mengubah warna segitiga menjadi putih */
    }

    .fixed-top-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        /* Pastikan navbar muncul di atas konten lainnya */
    }
    .navbar-nav {
    margin: 0 auto;
    display: flex;
    justify-content: center;
}

</style>
</head>

    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top-navbar" style="background-color: white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logos/logo.png') }}" style="max-height: 100px" alt="filter-img" class="logo-img py-0 px-0" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                            <h4 style="color: {{ Request::is('/') ? '#255734;' : '' }}">Beranda</h4>
                        </a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link {{ Request::is('/daftarharga') ? 'active' : '' }}" href="{{ route('daftarharga') }}">
                            <h4 style="color: {{ Request::is('/daftarharga') ? '#255734;' : '' }}">Daftar Harga</h4>
                        </a>
                    </li>

                    <li class="nav-item px-3 py-2">
                        <a class="nav-link {{ Request::is('/check') ? 'active' : '' }}" href="/check">
                            <h4 style="color: {{ Request::is('/check') ? '#255734;' : '' }}">Pemesanan</h4>
                        </a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link {{ Request::is('/checks') ? 'active' : '' }}" href="/checks">
                            <h4 style="color: {{ Request::is('/checks') ? '#255734;' : '' }}">Riwayat Pemesanan</h4>
                        </a>
                    </li>
                    @if (auth()->check())
                    <li class="nav-item dropdown px-3 py-2">
                        <a href="#" class="nav-link text-body p-0" id="profileDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="profile-img"
                                style="width: 60px; height: 60px; overflow: hidden; border-radius: 50%;">
                                @php
                            $photo = auth()->user()->photo;
                        @endphp

                        <img src="{{ $photo ? asset('assets/img/profile/' . $photo) : asset('assets/img/profile/user.png') }}"
                            alt="profile-img" class="img-fluid mb-n8"
                            style="object-fit: cover; width: 100%; height: 100%;" />
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('user-profile') }}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </li>
                @else
                <li class="nav-item px-3 py-2">
                    <a class="nav-link {{ Request::is('/sign-in') ? 'active' : '' }}" href="/sign-in">
                        <h4 style="color: {{ Request::is('/sign-in') ? '#255734;' : '' }}">Login</h4>
                    </a>
                </li>
                @endif

                </ul>
            </div>
        </div>
    </nav>
