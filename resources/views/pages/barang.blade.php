<x-layout bodyClass="g-sidenav-show  bg-gray-50">
    <x-navbars.sidebar activePage="barang"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->

        <x-navbars.navs.auth titlePage="barang"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <h4 style="color: #245734;" class="m-0">DAFTAR HARGA</h4>
            <div class="card my-4">
                <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="row">

                            <div class="col-3">
                                <div class="me-3 my-3 text-end d-flex mx-3">
                                    <form action="{{ route('search') }}" method="GET"
                                        class="input-group input-group-outline">
                                        <label class="form-label"></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword"
                                                placeholder="Searching...">
                                            <button class="py-1" type="submit" class="btn"
                                                style="background-color: #245734; border-radius: 10%;">
                                                <i class="fas fa-search" style="color: white;"></i>
                                                <!-- Menggunakan Font Awesome icon search -->
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                                    @csrf
                                </form>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-7">
                                <div class="me-3 my-3 text-end">
                                    <a class="btn btn-success btn-link" data-bs-toggle="modal" data-bs-target="#addjen">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah
                                    </a>
                                </div>
                            </div>



                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0" style="max-height: 200%; overflow-y: auto;">
                                <table class="table align-items-center mb-0">
                                    <thead style="background-color: #245734; color: white; ">
                                        <tr>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                ID
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                GAMBAR
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                NAMA PAKET
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                HARGA
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                DURASI
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                DESKRIPSI
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder m-0">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datahargas as $dataharga)
                                            <tr>
                                                <td class="text-center" contenteditable="true">{{ $dataharga->id }}</td>
                                                <td class="text-center" contenteditable="true">
                                                    <img src="{{ asset('assets/img/dokumentation/' . $dataharga->gambar) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{ $dataharga->judul }}">
                                                </td>
                                                <td class="text-center" contenteditable="true">{{ $dataharga->nama }}
                                                </td>
                                                <td class="text-center" contenteditable="true">{{ number_format($dataharga->harga, 0, ',', '.') }}</td>

                                                <td class="text-center" contenteditable="true">{{ $dataharga->durasi }} Jam
                                                </td>
                                                <td class="text-center" contenteditable="true">
                                                    <div class="description">
                                                        <?php
                                                        $text = $dataharga->deskripsi;
                                                        if (strlen($text) > 50) {
                                                            $text = substr($text, 0, 50) . '...';
                                                        }
                                                        echo $text;
                                                        ?>
                                                    </div>
                                                </td>



                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-2"></div>
                                                        <div class="col-lg-4">
                                                            <a rel="tooltip" class="btn btn-warning btn-link"
                                                                href="#" data-original-title="Edit"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#upbarang{{ $dataharga->id }}">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <form
                                                                action="{{ url('/deletebarang', ['id' => $dataharga->id]) }}"
                                                                method="post"
                                                                onclick="return confirm('Yain ingin menghapus data?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-link delete-button"
                                                                    data-original-title="" title=""
                                                                    data-id="{{ $dataharga->id }}">
                                                                    <i class="material-icons">delete</i>
                                                                    <div class="ripple-container">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>



    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#harga').on('input', function() {
                // Menghapus semua karakter non-digit dari input
                var input = $(this).val().replace(/\D/g, '');
                // Memformat angka dengan menambahkan titik setiap tiga digit
                var formattedInput = input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                // Menetapkan input yang diformat kembali ke input
                $(this).val(formattedInput);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var hargaInput = document.getElementById('harga');

            hargaInput.addEventListener('input', function() {
                // Menghapus semua karakter non-digit dari input
                var input = this.value.replace(/\D/g, '');
                // Memformat angka dengan menambahkan titik setiap tiga digit
                var formattedInput = input.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                // Menetapkan input yang diformat kembali ke input
                this.value = formattedInput;
            });
        });
    </script>

</x-layout>

@foreach ($jeniss as $jenis)
    <div class="modal fade" id="addjen" tabindex="-1" aria-labelledby="addjen" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddoc">Tambah Daftar Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('insertbarang.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 px-2">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control px-2" id="nama" name="nama" required
                                style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3 px-2">
                            <label for="id_jenis" class="form-label">Jenis</label>
                            <select class="form-select px-2" id="id_jenis" name="id_jenis" required
                                style="border: 2px solid #245734;">
                                @foreach ($jeniss as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 px-2">
                            <label for="durasi" class="form-label">Durasi</label>
                            <input type="text" class="form-control px-2" id="durasi" name="durasi" required
                                style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3 px-2">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required
                                style="border: 2px solid #245734; padding: 5px;">
                        </div>
                        <div class="mb-3 px-2">
                            <label for="harga" class="form-label">Harga</label>

                            <div class="input-group">

                                <div class="row">
                                    <div class="col-lg-10">
                                    <input type="text" class="form-control px-2" id="harga" name="harga"
                                        required style="border: 2px solid #245734;" />
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        Jam
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 px-2">
                            <label for="gambar" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control px-2" id="gambar" name="gambar[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div>
                        <div class="text-end px-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


@foreach ($datahargas as $dataharga)
    <div class="modal fade" id="upbarang{{ $dataharga->id }}" tabindex="-1" aria-labelledby="upbarang"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addbarang">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updatebarang.store', ['id' => $dataharga->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control px-2" id="nama" name="nama" required
                                style="border: 2px solid #245734;" value="{{ $dataharga->nama }}" required
                                style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3">
                            <label for="id_jenis" class="form-label">Jenis</label>
                            <select class="form-select px-2" id="id_jenis" name="id_jenis" required
                                style="border: 2px solid #245734;">
                                @foreach ($jeniss as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="durasi" class="form-label">Durasi</label>
                            <input type="text" class="form-control px-2" id="durasi" name="durasi" required
                                style="border: 2px solid #245734;" value="{{ $dataharga->durasi }}" required
                                style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control px-2" id="deskripsi" name="deskripsi" required
                                style="border: 2px solid #245734;" value="{{ $dataharga->deskripsi }}" required
                                style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3">


                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <input type="text" class="form-control px-2" id="harga" name="harga"
                                    value="{{ $dataharga->harga }}" required style="border: 2px solid #245734;">
                                <span class="input-group-text">Rp.</span>
                            </div>


                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control px-2" id="gambar" name="gambar[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
