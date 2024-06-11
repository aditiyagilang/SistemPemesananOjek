<x-layout bodyClass="g-sidenav-show bg-gray-50">

    <x-navbars.sidebar activePage="admin-profile"></x-navbars.sidebar>

    <div class="main-content position-relative py-5 px-5 max-height-vh-100 h-100">


        <div class="row py-5">
            <div class="container" style="height: 100px"></div>
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
                        <h6 class="mb-3">Informasi Profil</h6>
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
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control border border-2 p-2"
                                value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                                <p class="text-danger inputerror">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">No.Telepon</label>
                            <input type="text" name="phone" class="form-control border border-2 p-2"
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

                    <hr class="horizontal light mt-1">
                    <div class="mt-1 text-end" id="sidenav-collapse-main">
                        <ul class="navbar-nav mt-1">
                            <li class="nav-item mt-1">
                                <button type="submit" class="btn btn-success btn-link text-end mt-1">Ubah Profil</button>
                            </li>
                        </ul>
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
                <form method="POST" action="{{ route('update-user-profile-photo') }}" enctype="multipart/form-data">
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
