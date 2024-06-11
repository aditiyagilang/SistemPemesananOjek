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
    <script src="https://cdn.shieldui.com/shieldui/1.7.0/js/shieldui-all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.shieldui.com/shieldui/1.7.0/styles/light-bootstrap/all.min.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <div class="container" style="height: 1px"></div>

    <div class="carousel-inner">
        <div class="carousel-item active">

            <div class="row py-5">
                <div class="col-lg-5" style="position: relative; margin-top: -70px;">
                    <img class="img-fluid" src="{{ asset('assets/img/icons/angkut.png') }}" alt=""
                        style="float: left; width: 250%; ">
                </div>

                <div class="col-lg-1 "></div>
                <div class="col-lg-5 mb-0 d-flex align-items-center" style="position: relative; top: -45px;">
                    <div class="text-align-left align-self-center">
                        <h2 style="color: #E38029; font-size: 70px;"><b>Angkutan</b></h2>
                        <h2 style="color: #3EA449; font-size: 70px;"><b>Wisata Jember</b></h2>
                        <h3 class="h7"> Selamat Datang!</h3>
                        <p>
                            Nikmati berwisata di jember dengan menggunakan angkot sultan.
                        </p>
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-5">
                                    <div class= "container text-start"
                                        style="width: 200px; height: 50px; background-color: white; display: flex; justify-content: center; align-items: center;margin-left: 0;  border-radius: 10px; border: 1px solid #505752; margin-left: -10%;">
                                        <a href="https://wa.me/6281234552499"> <span
                                                style="color: #505752; font-size: 15px; font-weight: 600; text-align: center;">Kontak
                                                Kami</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <a href="sejarah" style="text-decoration: none;">
                                        <div class="container px-3"
                                        style="width: 200px; height: 50px; background-color: #E38029; display: flex; align-items: center; justify-content: center; padding: 10px; border-radius: 10px;">
                                        <a href="https://www.instagram.com/angkutanwisatajember?igsh=MWdpdW0xbXU3ZXlzNQ=="
                                        style="color: white; font-size: 10px; font-weight: 600; margin-right: 5px; line-height: 20px; vertical-align: middle;">
                                        Instagram
                                    </a>
                                    <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png"
                                    alt="profile-img" class="img-fluid" style="width: 15px; margin-right: -2px;" />
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-1"></div>
            </div>




            <div class="col-lg-3"></div>
        </div>


    </div>


    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card-header p-3   mx-3 z-index-2 bg-transparent">
                    <h2 style="color: #255735; font-size: 40px; margin-bottom: 10px;"><b><br>Grafik Angkutan Wisata
                            Jember</br></b></h2>
                            <div class="card-body" style="text-align: justify;">
                        <p style="margin-bottom: 10px;">"Grafik ini merupakan sebuah grafik tentang tingkat keramaian yang terjadi di angkutan wisata Jember, sehingga dapat digunakan sebagai acuan keramaian. Data yang ditampilkan dalam grafik ini mencakup informasi tentang jumlah pemesanan setiap harinya."</p>
                    </div>


                    <div class=" shadow-dark border-radius-lg" style="background-color: #ffffff; ">
                        <div class="chart">
                            <canvas id="chart-line-tasks" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        fetch('/pesanan/grafik-transaksi-per-hari')
            .then(response => response.json())
            .then(data => {
                new Chart(ctx3, {
                    type: "line",
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: '', // Menghilangkan teks dari legenda
                            data: data.datasets[0].data,
                            backgroundColor: '#255735', // Mengubah warna latar belakang menjadi transparan
                            borderColor: '#255735', // Menggunakan warna putih untuk garis
                            borderWidth: data.datasets[0]
                                .borderWidth, // Menggunakan lebar garis dari dataset
                            pointBackgroundColor: 'rgba(255, 255, 255, 0)', // Mengatur warna latar belakang titik menjadi transparan
                            pointBorderColor: '#255735', // Mengatur warna border titik menjadi transparan
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false, // Menyembunyikan legenda
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
        grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5],
            color: 'rgba(255, 255, 255, .2)'
        },
        ticks: {
            display: true,
            padding: 10,
            color: '#255735',
            font: {
                size: 20,
                weight: 900,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2,
                color: '#255735'
            },
            callback: function(value, index, values) {
                // Menampilkan angka bulat hanya untuk nilai yang berbeda dengan nilai sebelumnya
                if (value === 1 || value % 1 === 0) {
                    return value;
                }
                return '';
            }
        }
    },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#255735',
                                    padding: 10,
                                    font: {
                                        size: 20,
                                        weight: 900,
                                        family: "Roboto",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                },

                            },
                        },
                    },
                });
            });
    </script>



    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <div class="carousel-inner py-2" style="margin-top: 3%;">
        <div class="carousel-item active">
            <div class="container">
                <div class="text-align-left align-self-center ">
                    <h2 style="color: #255735; font-size: 40px; margin-bottom: 20px;"><b><br>Apa itu Angkutan Wisata
                            Jember ?</br></b></h2>
                    <p style="font-size: 25px; color: black; text-align: justify; margin-top: 3%; ">
                        Angkutan wisata jember merupakan program pemberdayaan masyarakat kolaborasi Pemkab Jember dengan
                        Pegiat Social Tourism Tamasya Bus Kota. Angkutan wisata terdiri dari angkutan kota, angkutan
                        pedesaan, ojek konvensional dan becak. Program ini diharapkan dapat mempermudah akses ke
                        kawasan-kawasan wisata sehingga mempercepat pembangunan perekonomian jember khususnya melalui
                        bidang pariwisata secara efektif dan efisien. Melalui pemberdayaan pengemudi angkutan
                        konvensional selain berdampak positif pada kesejahteraan pengemudi angkutan juga turut
                        mempercepat tumbuh dan berkembangnya destinasi wisata, UMKM, Pelaku kuliner, serta mitra yang
                        lainnya.
                    </p>
                </div>
                <a href="sejarah" style="text-decoration: none; margin-left: -10%;">
                    <div class="col-lg-2" style="margin-top: -15px;">
                        <div class=" container px-3"
                            style="width: 200px; height: 50px; background-color: #E38029; display: flex; justify-content: space-between; align-items: center; padding: 10px; border-radius: 10px; margin-bottom: 40px; margin-left: -10%;">
                            <span class="text-center" style="color: white; font-size: 20; font-weight: 600;">Jelajahi
                                Sejarah</span>
                            <i class="text-center"
                                style=" display: flex; justify-content: space-between; align-items: center; color: white; font-weight: bold; font-size: 34px;">&#8594;</i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="carousel-inner py-2">
        <div class="carousel-item active">
            <div class="container" style="overflow-x: auto; white-space: nowrap; display: flex; margin-top: 2%;">
                @foreach ($documentations as $documentation)
                    <div style="margin-right: 10px;">
                        <img src="{{ asset('assets/img/dokumentation/' . $documentation->foto) }}"
                            alt="Documentation Image"
                            style="border-radius: 30px; width: 359px; height: 220px; object-fit: cover;">
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col-lg-4">
            <div class="carousel-inner py-5">
                <div class="carousel-item active">
                    <div class="container py-3">
                        <div class="text-align-left align-self-center">
                            <h2 class="text-center" style="color: #505752; font-size: 40px;"><b>Fasilitas Yang
                                    Tersedia</b></h2>
                            <ul class="text-center" style="font-size: 25px; color: #505752; text-align: center;">
                                Sopir sekaligus pemandu wisata <br />Sofa <br /> Bantal <br /> Karaoke <br /> Air
                                Mineral <br /> Brosur Informasi Wisata
                            </ul>
                        </div>



                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="carousel-inner py-5">
                <div class="carousel-item active">

                    <div class="container py-3">
                        <div class="text-align-left align-self-center">
                            <h2 class="text-center" style="color: #505752; font-size: 40px;"><b>Kapasitas</b></h2>

                            <p class="text-center" style="font-size: 25px; color: #505752; text-align: center;">
                                Per angkutan wisata maksimal berkapasitas {{ $maxJumlah }} orang
                            </p>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="carousel-inner py-5">
                <div class="carousel-item active">
                    <div class="container py-3">

                                <div class="text-align-left align-self-center">
                                    <h2 class="text-center" style="color: #505752; font-size: 40px;"><b>Jenis Angkutan</b>
                                    </h2>


                                    <div class="text-center"
                                        style="font-size: 25px; color: #505752; text-align: center;">
                                        <span></span>
                                        @php
                                            $count = count($jenis);
                                        @endphp

                                        @foreach ($jenis as $index => $item)
                                            {{ ucfirst($item->nama) }}{{ $index === $count - 1 ? '.' : ',' }}
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

    <div class="carousel-inner py-5" style="margin-top: -1%;">
        <div class="carousel-item active">
            <div class="container">
            <h2 class="text-center" style="color: #255735; font-size: 40px; margin-bottom: 50px;"><b>Struktur Angkutan Wisata Jember</h2>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                        <div class="text-align-left align-self-center d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid"src="{{ asset('assets/img/profile/wisuda1.png') }}" alt>
                            <h2 style="color: #505752; font-size: 30px;">Hasti Utami</h2>
                            <p style="font-size: 20px; color: #505752">
                                Pencipta AWJ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-align-left align-self-center d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid"src="{{ asset('assets/img/profile/wisuda2.png') }}" alt>
                            <h2 style="color: #505752; font-size: 30px;">Hasti Utami</h2>
                            <p style="font-size: 20px; color: #505752">
                                Pencipta AWJ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 ml-3">
                        <div class="text-align-left align-self-center d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid"src="{{ asset('assets/img/profile/wisuda3.png') }}" alt>
                            <h2 style="color: #505752; font-size: 30px;">Hasti Utami</h2>
                            <p style="font-size: 20px; color: #505752">
                                Pencipta AWJ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-align-left align-self-center d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid"src="{{ asset('assets/img/profile/wisuda4.png') }}" alt>
                            <h2 style="color: #505752; font-size: 30px;">Hasti Utami</h2>
                            <p style="font-size: 20px; color: #505752">
                                Pencipta AWJ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="text-align-left align-self-center d-flex flex-column justify-content-center align-items-center">
                            <img class="img-fluid"src="{{ asset('assets/img/profile/wisuda5.png') }}" alt>
                            <h2 style="color: #505752; font-size: 30px;">Hasti Utami</h2>
                            <p style="font-size: 20px; color: #505752">
                                Pencipta AWJ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    @include('Users.footeruser')

</body>




</html>
