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
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-hEHCUGBzjFLjWHFM"></script>
    <!-- Pemanggilan CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-i+3F5KP4q+uAnZyQyRwvve0fS6+BiUm8KG6rvYDz3sVJHBn+Xo1/iu6UKhtWigkAs3PUdU5coU59g5+JsZap5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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


    <div class="container" style="height: 50px"></div>


    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container px-5 py-5">
                <div class="container py-5 px-3"
                    style="background: white; box-shadow: 0px 4px 10px -1px rgba(0, 0, 0, 0.21); border-radius: 16px">
                    <div class="container px-5">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-5 col-12">
                                <div class="container"
                                    style=" background: white; border-radius: 2px; border: 2px rgba(0, 0, 0, 0.30) solid">
                                    <div class="row py-2 px-2">
                                        <div class="col-lg-5 col-12 d-flex justify-content-center align-items-center">
                                            <img style="border-radius: 10px; width: 100%; height: 80%; object-fit: cover;"
                                                src="{{ asset('assets/img/dokumentation/' . $dataharga->gambar) }}" />
                                        </div>
                                        <div class="col-lg-5 col-12" style="display: flex; align-items: center;">
                                            <div>
                                                <h1
                                                    style="color: black; font-size: 30px; font-weight: bold; word-wrap: break-word;">
                                                    {{ $dataharga->nama }}
                                                </h1>
                                                <h1
                                                    style="color: black; font-size: 27px; font-weight: 400; word-wrap: break-word;">
                                                    Rp.{{ $dataharga->harga }}
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-12" style="position: relative;">
                                            <a href="/daftarharga" style="text-decoration: none">
                                                <img src="{{ asset('assets/img/icons/ex.png') }}"
                                                    style="position: absolute; top: 0; right: 0;" alt="filter-img" />
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 " style="height: 100%; object-fit: cover;">
                                <div class="container px-0  "
                                    style="height: 100%; object-fit: cover;  background: white; border-radius: 2px; border: 2px rgba(0, 0, 0, 0.30) solid">
                                    <div class="col-12">
                                        <div class="container"
                                            style="height: 20px; margin-bottom: 11px; margin-left: -9%; width: 118%; object-fit: cover; background: #A3CDAF; border-radius: 2px; border: 1px rgba(0, 0, 0, 0.15) solid">
                                        </div>
                                    </div>
                                    <div class="row py-3">


                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
                                            <img class="py-1" style="width: 60%; height: 100%; object-fit: containr;  "
                                                src="{{ asset('assets/img/icons/paymen.png') }}" />
                                        </div>
                                        <div class="col-lg-4 col-12 d-flex align-items-center text-centert justify-content-center">
                                            <h2
                                                style="color: black; font-size: 18px; font-weight: bold; word-wrap: break-word;">
                                                Transaksi
                                            </h2>
                                        </div>



                                        <div class="col-lg-1" style="margin-bottom: 28px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-5 ">
                            <div class="col-lg-7 col-12 ">
                                <div
                                    style="width: 100%; height: 100%; object-fit: cover; background: white; border-radius: 2px; border: 2px rgba(0, 0, 0, 0.15) solid">
                                    <div class="row py-3 px-2 text-center">
                                        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
                                            <h2
                                                style="color: black; font-size: 25px; font-weight: 500; word-wrap: break-word; margin-bottom: 0; text-align: center;">
                                                Jumlah Angkutan</h2>
                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-4 col-12 d-flex align-items-center justify-content-center">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-3 col-3 d-flex align-items-center justify-content-center px-0"
                                                        style="background-color: #369251;">
                                                        <a href="#" style="text-decoration: none;">
                                                            <h1 id="minus"
                                                                style="color: white; font-size: 30px; font-weight: 700; word-wrap: break-word;">
                                                                -</h1>
                                                        </a>
                                                    </div>

                                                    <div id="countDisplay"
                                                        class="col-lg-3 col-3 d-flex align-items-center justify-content-center px-0"
                                                        style="background-color: #DFEDE3;">
                                                        <h2 id="count"
                                                            style="color: black; font-size: 20px; font-weight: 500; word-wrap: break-word;">
                                                            1</h2>
                                                    </div>

                                                    <div class="col-lg-3 col-3 d-flex align-items-center justify-content-center px-0"
                                                        style="background-color: #369251;">
                                                        <a href="#" style="text-decoration: none;">
                                                            <h1 id="plus"
                                                                style="color: white; font-size: 30px; font-weight: 700; word-wrap: break-word;">
                                                                +</h1>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-12 mt-3 margin-top:5%;">
                                <form action="{{ route('transaksi') }}" method="POST">
                                    @csrf <!-- Tambahkan csrf token untuk keamanan -->
                                    <input type="hidden" name="id_dataharga" value="{{ $dataharga->id }}" />
                                    <input type="hidden" id="jumlah" name="jumlah" value="1">
                                    <!-- Input hidden untuk jumlah -->

                                    <div class="mb-3 px-2">
                                        <label for="nama" class="form-label">Nama :</label>
                                        <input type="text" class="form-control px-2" id="nama"
                                            name="nama" required style="border: 2px rgba(0, 0, 0, 0.15) solid;">
                                    </div>
                                    <div class="mb-3 px-2">
                                        <label for="alamat" class="form-label">Alamat Penjemputan :</label>
                                        <input type="text" class="form-control px-2" id="alamat"
                                            name="alamat" required style="border: 2px rgba(0, 0, 0, 0.15) solid;">
                                    </div>
                                    <div class="mb-3 px-2">
                                        <label for="nohp" class="form-label">No Telpon :</label>
                                        <input type="text" class="form-control px-2" id="nohp"
                                            name="nohp" required style="border: 2px rgba(0, 0, 0, 0.15) solid;">
                                    </div>
                                    <div class="mb-3 px-2">
                                        <label for="tanggal" class="form-label">Tanggal dan waktu Pemesanan :</label>
                                        <input type="dateTime" class="form-control px-2" id="tanggal"
                                            name="tanggal" required style="border: 2px rgba(0, 0, 0, 0.15) solid;">
                                    </div>

                                    <div class="d-flex mr-3 mt-4"> 
                                    <button
                                    id="pay-button" type="submit" class="btn btn-success ml-2" style="padding-right: 15px;">Pesan</button>
                                    <!-- Tombol Submit -->
                                    </div>
                                </form>

                            </div>



                            <div class="col-lg-1"></div>
                            <div class="col-lg-4 col-12">
                                <div class="row">
                                    <div class="row py-4">
                                        <div class="col-lg-5 col-12 py-4 px-4"
                                            style="background: #A3CDAF; border-radius: 2px; border: 2px rgba(0, 0, 0, 0.15) solid">
                                            <h1
                                                style="color: black; font-size: 20px; font-weight: 500; word-wrap: break-word">
                                                Total Harga</h1>
                                        </div>

                                        <div id="totalPriceContainer"
                                            class="col-lg-7 col-12 py-4 px-4 d-flex align-items-center justify-content-center"
                                            style="background: white; border-radius: 2px; border: 2px rgba(0, 0, 0, 0.15) solid;">
                                            <h1 id="totalPrice"
                                                style="color: black; font-size: 20px; font-weight: 500; word-wrap: break-word">
                                                Rp. 0</h1>
                                        </div>

                                    </div>
                                </div>
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


{{--
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.embed('{{$snapToken}}', {
                embedId: 'snap-container'
            });
        });
    </script> --}}
    <!-- End Footer -->
    <script>
        flatpickr("#tanggal", {
            enableTime: true, // Aktifkan pilihan waktu
            dateFormat: "Y-m-d H:i", // Format tanggal dan waktu yang akan ditampilkan
            minDate: "today", // Batasi pilihan tanggal tidak boleh sebelum hari ini
            // Opsional: Anda dapat menyesuaikan opsi lainnya sesuai kebutuhan Anda
        });
    </script>
<script>
    let count = parseInt(document.getElementById("count").innerText); // Ambil nilai awal dari elemen count
    const hargaPerItem = <?php echo $dataharga->harga; ?>; // Harga per item

    function calculateTotalPrice() {
        const totalPrice = count * hargaPerItem;
        const formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(totalPrice); // Format harga ke mata uang Rupiah
        document.getElementById("totalPrice").innerText = formattedPrice; // Perbarui nilai total harga di dalam elemen
        document.getElementById("jumlah").value = count; // Perbarui nilai jumlah di dalam input hidden
    }

    document.getElementById("plus").addEventListener("click", function () {
        count++;
        document.getElementById("count").innerText = count;
        calculateTotalPrice(); // Hitung total harga setiap kali jumlah diubah
    });

    document.getElementById("minus").addEventListener("click", function () {
        if (count > 1) {
            count--;
            document.getElementById("count").innerText = count;
            calculateTotalPrice(); // Hitung total harga setiap kali jumlah diubah
        }
    });

    // Hitung total harga saat halaman dimuat
    calculateTotalPrice();
</script>


    <!-- Start Script -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/templatemo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- End Script -->

</body>

</html>
