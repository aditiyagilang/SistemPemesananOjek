<x-layout bodyClass="">


    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
          >
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class=" shadow-primary border-radius-lg py-3 pe-1" style="background-color: #245734; color: white;">
                                    <div class="row mt-3">
                                            <h6 class='text-white text-center'>
                                                <span class="font-weight-normal">Lupa Kata Sandi</span> <br/> Angkutan Wisata Jember
                                            <div class="col-2 text-center me-auto">
                                            </div>
                                    {{-- <p class='text-light p-2'>You will receive an e-mail in maximum 60 seconds</p> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('status'))
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @elseif (Session::has('email'))

                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('email') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                                <form role="form" method="POST" action="{{ route('verify') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-2"   style="border-color: #245734;">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"   style="border-color: #245734;">
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn w-100 my-3 mb-2" style="background-color: #245734; color: white;">Kirim</button>
                                    </div>
                                    <p class="mt-3 text-sm text-center">
                                        Sudah Ingat Kata Sandi ?
                                        <a href="{{ route('login') }}"
                                            class="text-gradient font-weight-bold" style="background-color: #245734; color: white;">Masuk</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
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
