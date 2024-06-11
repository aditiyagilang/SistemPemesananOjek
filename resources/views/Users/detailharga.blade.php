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

    @include('Users.navbaruser')


    <!-- Close Header -->

    <div class="container" style="height: 70px"></div>

    <form action="{{ route('pesanan') }}" method="GET"
    class="input-group input-group-outline">
    <label class="form-label"></label>
    <div class="input-group">
        <input type="text" class="form-control" name="keyword"
            placeholder="Searching...">
        <button class="py-1" type="submit" class="btn"
            style="background-color: #245734; border-radius: 10%;">
            <i class="fas fa-search" style="color: white;"></i>
            <!-- Menggunakan Font Awesome icon search -->
        </button>
    </div>
</form>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container px-0">
                <h3 class="text-center py-5"
                    style="color: #255735; font-size: 54px;  font-weight: 600; word-wrap: break-word; margin-top: -50px;">
                    {{ $dataharga->nama }}</h3>
                <div class="container d-flex justify-content-center align-items-center">
                    <img style="border-radius: 10px; width: 40%; height: 50%; object-fit: cover; margin-top: -10px"
                        src="{{ asset('assets/img/dokumentation/' . $dataharga->gambar) }}" />
                </div>
                <a href="{{ route('Users.pemesanan', ['id' => $dataharga->id]) }}" style="text-decoration: none;">
                    <div class="container px-3 text-center"
                        style="margin-top: 3%;  width: 200px; height: 50px; background-color: #E38029; padding: 10px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">
                        <h2 class="text-center" style="color: white; font-size: 20px; font-weight: 600; margin: 0;">Pesan Disini
                        </h2>
                    </div>
                </a>


                <h4
                    style="margin-top: 5%; color: black; font-size: 24px; font-weight: 400; word-wrap: break-word; text-align: justify;">
                    {{ $dataharga->deskripsi }}
                </h4>

            </div>

        </div>

    </div>

    </div>



    <!-- Start Footer -->
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
