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

        justify-content: center;
        align-items: center;
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


    .navbar-nav {
    margin: 0 auto;
    display: flex;
    justify-content: center;
}

</style>
</head>

<footer>
    <div class="container d-flex justify-content-center align-items-center">
        <img style="height: 300px; margin-bottom: -3px;" src="{{ asset('assets/img/logos/logo.png') }}" alt="filter-img" />
    </div>
    <h2 class="text-center mt-4" style="color: #505752; font-size: 23px;"><b> Nikmati berwisata di jember dengan
            menggunakan angkot sultan. Selamat Datang!</b></h2>

            <div class="container px-5 mt-3">
    <div class="d-flex justify-content-center align-items-center">
        <ul class="nav mx-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <h4 style="color: #505752;">Beranda</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/daftarharga') ? 'active' : '' }}" href="{{ route('daftarharga') }}">
                    <h4 style="color: #505752;">Daftar Harga</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/check') ? 'active' : '' }}" href="/check">
                    <h4 style="color: #505752;">Pemesanan</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/history') ? 'active' : '' }}" href="/history">
                    <h4 style="color: #505752;">Riwayat Pemesanan</h4>
                </a>
            </li>
        </ul>
    </div>
</div>


    </div>
    <div class="container mt-5">

        <div class="row" >

           <div class="col-4"></div>
           <div class="col-lg-2 mx-auto">
            <a href="#">
                <div class="">
                    <img src="{{ asset('assets/img/logos/mitra1.png') }}"  style="width: 100%;"></i>
                </div>
            </a>
            </div>
            <div class="col-lg-2 mx-auto">
            <a href="#">
                <div class="">
                    <img src="{{ asset('assets/img/logos/mitra2.png') }}"  style="width: 45%;"></i>
                </div>
            </a>
            </div>
            <div class="col-4"></div>
        </div>

    </div>
    <p class="text-center py-5" style="font-size: 25px; color: #505752; text-align: center;">
        Jika ada pesan, kesan, kritik dan saran atau ada hal yang kurang layak dipublikasikan. Silahkan hubungi kami
        melalui kontak atau email yang telah disediakan.
    </p>
</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/templatemo.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- End Script -->
