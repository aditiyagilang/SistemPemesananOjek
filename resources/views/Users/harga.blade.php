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



<body>

    <!-- Header -->
    @include('Users.navbaruser')


    <!-- Close Header -->


    <div class="container" style="height: 50px"></div>
    <div class="carousel-inner py-2">
        <div class="carousel-item active">
            <div class="row px-5 ">
                <div class="col-lg-12 ">

                    <div class="container text-center" style=" background: #369251; border-radius: 12px">
                        <div class="col-lg-2 col-12" style=" margin-left: -2%;">
                            <div class="container "
                                style=" background: #255734; border-top-left-radius: 12px; border-bottom-right-radius: 12px">
                                <div class="py-2"
                                    style="color: white; font-size: 14px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                    Yang Tersedia</div>
                            </div>
                        </div>

                        <div class="row px-2 py-3">
                            <div class="col-lg-8 px-5 col-12">
                                <div class="text-start" style=" color: white; font-size: 50px; font-weight: bolder;">
                                    <h2 style="color: white; font-size: 55px; font-weight: bold; align-items: left;">10
                                        Angkutan <br />Wisata Jember</h2>
                                </div>
                                <div class="text-start"
                                    style=" color: white; font-size: 30px;  font-weight: 400; word-wrap: break-word">
                                    <h2 style="color: white; font-size: 25px; font-weight: bold; align-items: left;">
                                        only all orders</h2> <br />
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <img style="width: 283px; height: 239px; margin-top: -20%"
                                    src="{{ asset('assets/img/logos/logo2.png') }}" />
                            </div>

                        </div>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container px-0">
                                <div class="row px-5 py-5">
                                    @foreach ($dataharga as $data)
                                        <div class="col-lg-3 col-12 px-4 mb-4">
                                            <a href="{{ route('Users.detailharga', ['id' => $data->id]) }}"
                                                style="text-decoration: none;">
                                                <img style="border-radius: 10px; width: 100%; height: 50%; object-fit: cover;"
                                                    src="{{ asset('assets/img/dokumentation/' . $data->gambar) }}" />
                                                <h4
                                                    style="margin-top: 10%; color: black; font-size: 24px; font-weight: 400; word-wrap: break-word;">
                                                    {{ $data->nama }}</h4>
                                                <h4
                                                    style="color: black; font-size: 24px; font-weight: 400; word-wrap: break-word;">
                                                    Durasi {{ $data->durasi }} Jam</h4>
                                                <h3
                                                    style="color: black; font-size: 24px; font-weight: 600; word-wrap: break-word;">
                                                    Rp.{{ $data->harga }}</h3>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>


    @include('Users.footeruser')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/templatemo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- End Script -->

</body>

</html>
