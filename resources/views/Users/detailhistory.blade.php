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
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-hEHCUGBzjFLjWHFM"></script>
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



    <div class="carousel-inner">
        <div class="carousel-item active px-2">
            <div class="container  py-10 vh-200">
                <div class="row">
                    <h2 style="color: #255735; font-size: 40px; "><b>Daftar Riwayat</b></h2>
                    <div class="col-lg-4 col-12 py-5" style="max-height: 700px; overflow-y: auto;">
                        <form action="{{ route('historys') }}" method="GET" class="input-group input-group-outline">
                            <label class="form-label"></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Searching...">
                                <button class="py-1" type="submit" class="btn" style="background-color: #245734; border-radius: 10%;">
                                    <i class="fas fa-search" style="color: white;"></i>
                                </button>
                            </div>
                        </form>
                        @foreach ($transaksiDatas as $data)
                            <a href="{{ route('detail.transaksi', $data->id) }}">
                                <div class="row py-2">
                                    <div class="col-lg-1"
                                        style="background: @if ($data->status == 'Belum') yellow;
                                @elseif($data->status == 'Selesai')
                                green;
                                 @elseif($data->status == 'Setuju')
                                blue;
                                @elseif($data->status == 'Batal')
                                red;
                                @elseif($data->status == 'Tolak')
                                    red; @endif border-radius: 2px">
                                    </div>
                                    <div class="col-lg-11"
                                        style="background: white; border-radius: 4px; border: 3px rgba(0, 0, 0, 0.15) solid">
                                        <h1 class="py-3"
                                            style="color: black; font-size: 25px; font-family: Poppins; font-weight: bold; word-wrap: break-word">
                                            Pesanan {{ $data->dataharga_nama }}
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-lg-8 col-12 py-5">
                        @foreach ($transaksiDatas as $data)
                            <div class="row py-2">
                                <div class="col-lg-1"
                                    style="background: @if ($data->status == 'Belum') yellow;
                            @elseif($data->status == 'Selesai')
                            green;

                             @elseif($data->status == 'Setuju')
                            blue;
                             @elseif($data->status == 'Batal')
                            red;
                            @elseif($data->status == 'Tolak')
                                red; @endif border-radius: 2px">
                                </div>
                                <div class="col-lg-11"
                                    style="background:
                               white
                                border-radius: 4px; border: 3px rgba(0, 0, 0, 0.15) solid">
                                    @if ($data->status == 'Belum')
                                        <h1 class="py-3"
                                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                            Status : Menunggu Konfirmasi Admin
                                        </h1>
                                    @else
                                        <h1 class="py-3"
                                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                            Status : {{ $data->status }}
                                        </h1>
                                    @endif

                                    <h1 class="py-3"
                                        style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                        Nama paket : {{ $data->dataharga_nama }}
                                    </h1>
                                    <h1 class="py-3"
                                        style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                        Jumlah Angkutan : {{ $data->jumlah }}
                                    </h1>
                                    <h1 class="py-3"
                                        style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                        Alamat : {{ $data->alamat }}
                                    </h1>
                                    <h1 class="py-3"
                                        style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                        No. Telpon : {{ $data->nohp }}
                                    </h1>
                                    <h1 class="py-3"
                                        style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                        Tanggal Dan Waktu Pemesanan : {{ $data->timestamp }}
                                    </h1>
                                    @if (!empty($data->note))
                                        <h1 class="py-3"
                                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                            Note : {{ $data->note }}
                                        </h1>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h1 class="py-3"
                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                                                Total : {{ $data->total_harga }}
                                            </h1>
                                        </div>
                                        <div class="col-8"></div>

                                        <div id="pay-button" class="col-lg-2 mb-3">
                                            <div class="me-3 my-3 text-end">
                                                @if ($data->status == 'Setuju')
                                                    <a class="btn btn-success btn-link pay-button"
                                                        data-bs-toggle="modal" data-bs-target="#add"
                                                        data-snap-token="{{ $data->snaptoken }}">
                                                        <i class="material-icons text-sm"
                                                            style= "font-style: normal; color: white;">Bayar</i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>


                                        @if ($data->status == 'Belum' || $data->status == 'Setuju')
                                            <div class="col-lg-2 mb-3">
                                                <div class="me-3 my-3 text-start">
                                                    <a class="btn btn-warning btn-link" rel="tooltip" href="#"
                                                        data-original-title="Edit" data-bs-toggle="modal"
                                                        data-bs-target="#uptran{{ $data->id }}">
                                                        <i class="material-icons text-sm"
                                                            style="font-style: normal; color: white;">Batal</i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="modal fade" id="uptran{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="uptran{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="uptran{{ $data->id }}">Batalkan Pesanan</h5>
                                                        <!-- <button type="button" class="btn-close" aria-label="Close" onclick="closeModal('{{ $data->id }}')"></button> -->
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="{{ route('cancel.store', ['id' => $data->id]) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="note"
                                                                    class="form-label">Alasan</label>
                                                                <input type="text" class="form-control px-2"
                                                                    id="note" name="note" required
                                                                    style="border: 2px solid #245734;">
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>



                </div>

            </div>

        </div>

    </div>

    </div>



    <!-- Start Footer -->
    @include('Users.footeruser')
    <script>
    function closeModal(modalId) {
        var modal = document.getElementById('uptran' + modalId);
        if (modal) {
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.hide();
        }
    }
</script>
    <script>
        // Menangkap semua tombol 'Batal' dengan kelas btn-warning
        var cancelButton = document.querySelectorAll('.btn-warning');

        // Loop melalui setiap tombol 'Batal' dan tambahkan event listener untuk menampilkan modal yang sesuai saat diklik
        cancelButton.forEach(function(button) {
            button.addEventListener('click', function() {
                // Ambil data-bs-target dari tombol yang diklik
                var target = this.getAttribute('data-bs-target');

                // Periksa apakah target ada
                if (target) {
                    // Temukan modal yang sesuai berdasarkan data-bs-target
                    var modal = document.querySelector(target);

                    // Periksa apakah modal ditemukan
                    if (modal) {
                        // Tampilkan modal
                        var bootstrapModal = new bootstrap.Modal(modal);
                        bootstrapModal.show();
                    }
                }
            });
        });
    </script>

    <!-- End Footer -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var payButtons = document.querySelectorAll('.pay-button');
            payButtons.forEach(function(payButton) {
                payButton.addEventListener('click', function() {
                    var snapToken = payButton.getAttribute('data-snap-token');

                    if (snapToken) {
                        var snapUrl = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/' + snapToken;

                        var popUpWindow = window.open(snapUrl, '_blank',
                            'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600'
                        );

                        var checkWindowClosed = setInterval(function() {
                            if (popUpWindow.closed) {
                                clearInterval(checkWindowClosed);
                                alert(
                                    'Pop-up window closed without completing the payment.'
                                );
                            }
                        }, 1000);
                    } else {
                        alert('Snap token is missing.');
                    }
                });
            });
        });
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
