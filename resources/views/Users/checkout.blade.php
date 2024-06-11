<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-hEHCUGBzjFLjWHFM"></script>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/logos/logo.png">
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logos/logo.png">
    <title>
        Angkutan Wisata
    </title>
    <!-- Pemanggilan CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-i+3F5KP4q+uAnZyQyRwvve0fS6+BiUm8KG6rvYDz3sVJHBn+Xo1/iu6UKhtWigkAs3PUdU5coU59g5+JsZap5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Pemanggilan Font Google -->
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



                    <div class="container"
                        style="height: 20%; width: 20%; background: @if ($transaction->status == 'Belum') yellow;
                                @elseif($transaction->status == 'Selesai')
                                green;
                                @elseif($transaction->status == 'Ditolak')
                                    red; @endif border-radius: 2px">
                    </div>

                    <div
                        style="background:
                                   white
                                    border-radius: 4px; ">
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            Nama paket : {{ $data->nama }}
                        </h1>
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            Jumlah Angkutan : {{ $transaction->jumlah }}
                        </h1>
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            Alamat : {{ $transaction->alamat }}
                        </h1>
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            No. Telpon : {{ $transaction->nohp }}
                        </h1>
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            Tanggal Dan Waktu Pemesanan : {{ $transaction->created_at }}
                        </h1>
                        <h1 class="py-3"
                            style="color: black; font-size: 27px; font-family: Poppins; font-weight: 500; word-wrap: break-word">
                            Total : {{ $transaction->total_harga }}
                        </h1>

                    </div>
                    <button id="pay-button" >
                        <div class="container" style="background-color: #255735; border-radius: 4px;">
                            <p>Bayar</p>
                        </div>
                    </button>
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

    {{-- <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script> --}}

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Construct the URL with the snapToken
            var snapUrl = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/{{ $snapToken }}';

            // Open a pop-up window with the snap URL
            var popUpWindow = window.open(snapUrl, '_blank',
                'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=800,height=600');

            // Handle the case when the pop-up window is closed
            var checkWindowClosed = setInterval(function() {
                if (popUpWindow.closed) {
                    clearInterval(checkWindowClosed);
                    // Add your code here to handle pop-up closed event
                    alert('Pop-up window closed without completing the payment.');
                }
            }, 1000);
        });
    </script>


{{-- <script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Construct the URL with the snapToken
        var snapUrl = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/{{ $snapToken }}';

        // Redirect the current tab to the snap URL
        window.location.href = snapUrl;
    });
</script> --}}

    <!-- Start Script -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/templatemo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- End Script -->

</body>

</html>
