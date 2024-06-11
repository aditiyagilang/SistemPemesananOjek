<x-layout bodyClass="bg-gray-200">



    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            {{-- style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" --}}
            >
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class=" shadow-primary border-radius-lg py-3 pe-1" style="background-color: #245734; color: white;">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Ganti Kata Sandi</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('password.update', ['token' => $token]) }}" class="text-start">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Kata Sandi Baru</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Konfirmasi Kata Sandi</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn w-100 my-2 mb-2" style="background-color: #245734; color: white;">Ganti Kata Sandi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-layout>
