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
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript"
    src="https://app.stg.midtrans.com/snap/snap.js"
data-client-key="{{config('midtrans.client_key')}}"></script>
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

    <div class="container" style="height: 70px"></div>



    <div class="carousel-inner">
        <div class="carousel-item active px-2">
            <div class="container  py-10 vh-200">
                <div class="row">
                    <h2 style="color: #255735; font-size: 40px; "><b>Daftar Riwayat</b></h2>
                    <div class="col-lg-4 col-12 py-5" style="max-height: 700px; overflow-y: auto;">
                        <form action="{{ route('history') }}" method="GET" class="input-group input-group-outline">
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
                        @isset($detailTransaksi)
                        <div class="row py-2">
                            <div class="col-lg-1"
                                style="background: @if ($detailTransaksi->status == 'Belum') yellow;
                        @elseif($detailTransaksi->status == 'Selesai')
                        green;
                        @elseif($detailTransaksi->status == 'Ditolak')
                            red; @endif border-radius: 2px">
                            </div>
                            <div class="col-lg-10"
                                style="background:
                           white
                            border-radius: 4px; border: 3px rgba(0, 0, 0, 0.15) solid">
                                <h2 class="py-3"
                                    style="color: black; font-size: 25px; font-family: Poppins; font-weight: 500; bold; word-wrap: break-word">
                                    Nama paket : {{$detailTransaksi->dataharga_nama}}
                                </h2>

                                <!-- Sisipkan detail lainnya di sini -->
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>

    </div>



    <!-- Start Footer -->
    @include('Users.footeruser')
    <!-- End Footer -->

    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
    <div id="snap-container"></div>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        window.snap.embed('$snapToken', {
          embedId: 'snap-container',
          onSuccess: function (result) {
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function (result) {
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function (result) {
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function () {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
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
