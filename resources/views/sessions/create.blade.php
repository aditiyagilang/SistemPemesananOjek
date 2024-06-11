<x-layout bodyClass="bg-gray-200">


        <main class="main-content  mt-0">
            <div class="page-header align-items-start min-vh-100"
                style="background-image: url(https://k-radiojember.com/assets/upload/image/WhatsApp_Image_2023-01-03_at_16_07_59.jpeg);">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container mt-5">
                    <div class="row signin-margin">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class=" shadow-primary border-radius-lg py-3 pe-1" style="background-color: #245734; color: white;">
                                        <div class="row mt-3">
                                            <h6 class='text-white text-center'>
                                                <span class="font-weight-normal">Selamat Datang</span> <br/> Angkutan Wisata Jember
                                            <div class="col-2 text-center me-auto">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login') }}" class="text-start">
                                        @csrf
                                        @if (Session::has('status'))
                                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ Session::get('status') }}</span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="input-group input-group-outline mt-3">
                                            <label class="form-label"></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" >
                                        </div>
                                        @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        <div class="input-group input-group-outline mt-3">
                                            <label class="form-label"></label>
                                            <input type="password" class="form-control" name="password" placeholder="Kata Sandi" >
                                        </div>
                                        @error('password')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror

                                        <p class="mt-3 text-sm text-center">
                                            <a href="{{ route('verify') }}"
                                                class=" font-weight-bold" style="color: #245734;  float: right;">Lupa kata sandi ?</a>
                                        </p>

                                        <div class="text-center">
                                            <button type="submit" class="btn  w-100 my-3 mb-2" style="background-color: #245734; color: white;">Masuk</button>
                                        </div>
                                        <p class="mt-2 text-sm text-center">
                                            Belum punya akun ?
                                            <a href="{{ route('register') }}"
                                                class="  font-weight-bold" style="color: #245734;">Daftar</a>
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