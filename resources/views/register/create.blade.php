<x-layout bodyClass="">

    <div>

        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col- d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary mx-n3  h-100  border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url(''); background-size: cover;">
                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">


                                <div class="card card-plain">
                                    <div class="container mt-2"
                                        style="box-shadow: 0 4px 8px 0 rgba(0.1, 0.1, 0.2, 0.4); border-radius: 3%;">
                                        <div class="card-header">
                                                <span class="font-weight-normal">Daftar Akun</span> <br/> Angkutan Wisata Jember
                                          
                                        </div>

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="input-group input-group-outline mt-3">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name') }}">
                                                </div>
                                                @error('name')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                                <div class="input-group input-group-outline mt-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ old('email') }}">
                                                </div>
                                                @error('email')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                                <div class="input-group input-group-outline mt-3">
                                                    <label class="form-label">Kata Sandi</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                @error('password')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror

                                                <div class="text-center">
                                                    <button type="submit"
                                                        class="btn btn-lg  btn-lg w-100 mt-4 mb-0" style="background-color: #245734; color: white;">Daftar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                            <p class="mb-4 text-sm mx-auto">
                                                Sudah punya akun ?
                                                <a href="{{ route('login') }}"
                                                    class=" font-weight-bold" style="color: #245734;">Masuk</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    @push('js')
        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
        <script>
            $(function() {

                var text_val = $(".input-group input").val();
                if (text_val === "") {
                    $(".input-group").removeClass('is-filled');
                } else {
                    $(".input-group").addClass('is-filled');
                }
            });
        </script>
    @endpush
</x-layout>
