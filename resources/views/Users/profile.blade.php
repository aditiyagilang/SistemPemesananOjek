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

    <x-layout bodyClass="g-sidenav-show bg-gray-50">

        <div class="main-content position-relative py-5 px-5 max-height-vh-100 h-100">

            <div class="container" style="height: 100px"></div>
            <div class="row py-5">
                <div class="col-7 d-flex justify-content-end mt-n8">
                    <a class="nav-link text-center p-0" id="profile">
                        <div class="position-relative"
                            style="width: 210px; height: 210px; overflow: hidden; border-radius: 50%;">
                            @php
                                $photo = auth()->user()->photo;
                            @endphp

                            <img src="{{ $photo ? asset('assets/img/profile/' . $photo) : asset('assets/img/profile/user.png') }}"
                                alt="profile-img" class="img-fluid mb-n8"
                                style="object-fit: cover; width: 100%; height: 100%;" />
                        </div>
                    </a>

                </div>
                <div class="col-7 d-flex justify-content-end mt-n6" style="position: relative; z-index: 1;">
                    <div class="icon icon-lg icon-shape bg-success text-center" data-bs-toggle="modal"
                        data-bs-target="#upphoto"
                        style="color: white; overflow: hidden; border-radius: 50%; border-radius-lg;">
                        <i class="material-icons" style="color: white;">camera_alt</i>
                    </div>
                </div>
            </div>


            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3">Profile Information</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('update-user-profile', ['id' => auth()->user()->id]) }}">
                        @csrf
                        @method('PUT') <!-- Use the PUT method for updates -->

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control border border-2 p-2"
                                    value="{{ old('email', auth()->user()->email) }}">
                                @error('email')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control border border-2 p-2"
                                    value="{{ old('name', auth()->user()->name) }}">
                                @error('name')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control border border-2 p-2"
                                    value="{{ old('phone', auth()->user()->phone) }}">
                                @error('phone')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control border border-2 p-2"
                                    value="{{ old('alamat', auth()->user()->alamat) }}">
                                @error('alamat')
                                    <p class="text-danger inputerror">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <hr class="horizontal light mt-5">
                        <div class="row" style="margin-top: -10%;">
                            <div class="col-8"></div>
                            <div class="col-lg-2" style="padding-left: 1%; " >
                            <a href="/">
                                <div class="mt-5 text-end" id="sidenav-collapse-main" style="margin-left: 60%;">
                                    <ul class="navbar-nav mt-5">
                                        <li class="nav-item mt-5">
                                           
                                            <button class="btn mt-5 px-5" style="background-color: grey; color: white;" disabled>Kembali</button>
                                          
                                        </li>
                                    </ul>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-2">
                                <div class="mt-5 text-end" id="sidenav-collapse-main">
                                    <ul class="navbar-nav mt-5">
                                        <li class="nav-item mt-5">
                                            <button type="submit"
                                                class="btn btn-success btn-link text-end mt-5">Update
                                                Profile</button>
                                        </li>
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </form>


                </div>
            </div>

          
        </div>


    </x-layout>


    <div class="modal fade" id="upphoto" tabindex="-1" aria-labelledby="upphoto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddoc">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update-user-profile-photo') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                            <label for="photo" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control" id="photo" name="photo[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>