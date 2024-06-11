<x-layout bodyClass="g-sidenav-show  bg-gray-50">
    <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dokumentasi"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <h4 style="color: #245734;" class="m-0">DOKUMENTASI</h4>
            <div class="card my-4">
                <div class="row">

                            <div class="col-3">
                                <div class=" me-3 my-3 text-end d-flex mx-3">
                                    <form action="{{ route('tables') }}" method="GET"
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
                            <div class="col-2">

                            </div>
                            <div class="col-7">
                                <div class="me-3 my-3 text-end">
                                    <a class="btn btn-success btn-link" data-bs-toggle="modal" data-bs-target="#adddoc">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah
                                    </a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="adddoc" tabindex="-1" aria-labelledby="adddoc"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="adddoc">Tambah Dokumentasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('insertdoc.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3 p-2">
                                                    <label for="judul" class="form-label">Judul</label>
                                                    <input type="text" class="form-control" id="judul"
                                                        name="judul" required style="border: 2px solid #245734; padding: 5px;">
                                                        

                                                </div>
                                                <div class="mb-3 p-2">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi"
                                                        name="deskripsi" required style="border: 2px solid #245734; padding: 5px;">
                                                </div>

                                                <div class="mb-3 p-2">
                                                    <label for="foto" class="form-label">Foto (jpg, png,
                                                        jpeg)</label>
                                                    <input type="file" class="form-control" id="foto"
                                                        name="foto[]" accept=".jpg, .jpeg, .png"
                                                        style="border: 2px solid #245734; padding: 5px;">
                                                </div>

                                                <div class="text-end px-2">
                                                <input type="hidden" name="level" value="admin">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto;">
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
                                                JUDUL
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder "
                                                style="width: 200px;">
                                                DESKRIPSI
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                TANGGAL
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder m-0">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dokumentasis as $dokumentasi)
                                        @if($dokumentasi->jenis == 'dokumentasi')
                                            <tr>
                                                <td class="text-center" contenteditable="true">{{ $dokumentasi->id }}
                                                </td>
                                                <td class="text-center" contenteditable="true">
                                                    <img src="{{ asset('assets/img/dokumentation/' . $dokumentasi->foto) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{ $dokumentasi->judul }}">
                                                </td>
                                                <td class="text-center" contenteditable="true">
                                                    {{ $dokumentasi->judul }}</td>
                                                <td class="text-center"

                                                    >
                                                    <?php
                                                    $text = $dokumentasi->deskripsi;
                                                    if (strlen($text) > 50) {
                                                        $text = substr($text, 0, 50) . '...';
                                                    }
                                                    echo $text;
                                                    ?>
                                                </td>
                                                <td class="text-center" contenteditable="true">
                                                    {{ \Carbon\Carbon::parse($dokumentasi->created_at)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-4">
                                                            <a rel="tooltip" class="btn btn-warning btn-link"
                                                                href="#" data-original-title="Edit"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#updoc{{ $dokumentasi->id }}">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <form
                                                                action="{{ url('/deletedoc', ['id' => $dokumentasi->id]) }}"
                                                                method="post"
                                                                onclick="return confirm('Yakin ingin menghapus data?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-link delete-button"
                                                                    data-original-title="" title=""
                                                                    data-id="{{ $dokumentasi->id }}">
                                                                    <i class="material-icons">delete</i>
                                                                    <div class="ripple-container">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                                
                                                @endif
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

        <script>
            function expandElement(element) {
                // Menghapus atribut "onclick" agar tidak dapat diklik lagi
                element.removeAttribute("onclick");

                // Mengatur tinggi elemen sesuai dengan konten
                element.style.height = "100px";
            }
        </script>
        </div>
        <div class="container-fluid py-4">
            <h4 style="color: #245734;" class="m-0">SEJARAH</h4>
            <div class="card my-4">
                <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-2"></div>
                            <div class="col-7">
                                {{-- <div class="me-3 my-3 text-end">
                                    <a class="btn btn-success btn-link" data-bs-toggle="modal"
                                        data-bs-target="#addsej">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah
                                    </a>
                                </div> --}}
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addsej" tabindex="-1" aria-labelledby="addsej"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            <h5 class="modal-title" id="addsej">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div> --}}
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('insertsej.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label">Judul</label>
                                                    <input type="text" class="form-control" id="judul"
                                                        name="judul" required style="border: 2px solid #245734;">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" id="deskripsi"
                                                        name="deskripsi" required style="border: 2px solid #245734;">
                                                </div>

                                                <!-- <div class="mb-3">
                                                    <label for="foto" class="form-label">Foto (jpg, png,
                                                        jpeg)</label>
                                                    <input type="file" class="form-control" id="foto"
                                                        name="foto[]" accept=".jpg, .jpeg, .png"
                                                        style="border: 2px solid #245734;">
                                                </div> -->


                                                <input type="hidden" name="level" value="admin">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0" style="max-height: 400px; overflow-y: auto;">
                                <table class="table align-items-center mb-0">
                                    <thead style="background-color: #245734; color: white; ">
                                        <tr>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                ID
                                            </th>
                                            <!-- <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                GAMBAR
                                            </th> -->
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                JUDUL
                                            </th>
                                            {{-- <th class="text-center text-uppercase  text-xxs font-weight-bolder "  style="width: 200px;">
                                                DESKRIPSI
                                            </th> --}}
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                                TANGGAL
                                            </th>
                                            <th class="text-center text-uppercase  text-xxs font-weight-bolder m-0">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sejarahs as $sejarah)
                                        @if($sejarah->jenis == 'sejarah')
                                            <tr>
                                                <td class="text-center" contenteditable="true">{{ $sejarah->id }}
                                                </td>
                                                <!-- <td class="text-center" contenteditable="true">
                                                    <img src="{{ asset('assets/img/dokumentation/' . $sejarah->foto) }}"
                                                        class="avatar avatar-sm me-3 border-radius-lg"
                                                        alt="{{ $sejarah->judul }}">
                                                </td> -->
                                                <td class="text-center" contenteditable="true">{{ $sejarah->judul }}
                                                </td>
                                                {{-- <td class="text-center container" style="word-wrap: break-word; max-width: 300px; max-height: 200px; overflow: auto;">
                                                    {{ $sejarah->deskripsi }}
                                                </td> --}}


                                                <td class="text-center" contenteditable="true">
                                                    {{ \Carbon\Carbon::parse($sejarah->created_at)->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-2">
                                                            <a rel="tooltip" class="btn btn-warning btn-link"
                                                                href="#" data-original-title="Edit"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#upsej{{ $sejarah->id }}">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <a rel="tooltip" class="btn btn-info btn-link"
                                                                href="#" data-original-title="Edit"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#info{{ $sejarah->id }}">
                                                                <i class="material-icons">info</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </div>
                                                        {{-- <div class="col-5">
                                                            <form
                                                                action="{{ url('/deletedoc', ['id' => $sejarah->id]) }}"
                                                                method="post"
                                                                onclick="return confirm('Yain ingin menghapus data?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-link delete-button"
                                                                    data-original-title="" title=""
                                                                    data-id="{{ $sejarah->id }}">
                                                                    <i class="material-icons">delete</i>
                                                                    <div class="ripple-container">
                                                                </button>
                                                            </form>
                                                        </div> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


</x-layout>


@foreach ($sejarahs as $sejarah)
    <div class="modal fade" id="upsej{{ $sejarah->id }}" tabindex="-1" aria-labelledby="upsej"
        aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddoc">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updatesej.store', ['id' => $sejarah->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control px-2" id="judul" name="judul"
                                value="{{ $sejarah->judul }}" required style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control px-2" id="deskripsi" name="deskripsi" required style="border: 2px solid #245734;">{{ $sejarah->deskripsi }}</textarea>

                        </div>

                        <!-- <div class="mb-3">
                            <label for="foto" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control px-2" id="foto" name="foto[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div> -->

                        <input type="hidden" name="level" value="admin">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($sejarahs as $sejarah)
    <div class="modal fade" id="info{{ $sejarah->id }}" tabindex="-1" aria-labelledby="upsej"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddoc">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updatesej.store', ['id' => $sejarah->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control px-2" id="judul" name="judul"
                                value="{{ $sejarah->judul }}" required style="border: 2px solid #245734;" disabled>
                        </div>
                        <p>{{ $sejarah->deskripsi }}</p>
                        {{-- <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control px-2" id="deskripsi" name="deskripsi"
                                value="{{ $sejarah->deskripsi }}" required style="border: 2px solid #245734;">
                        </div> --}}

                        <!-- <div class="mb-3">
                            <label for="foto" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control px-2" id="foto" name="foto[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div> -->

                        <input type="hidden" name="level" value="admin">
                        {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


@foreach ($dokumentasis as $dokumentasi)
    <div class="modal fade" id="updoc{{ $dokumentasi->id }}" tabindex="-1" aria-labelledby="updoc"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddoc">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updatesej.store', ['id' => $dokumentasi->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control px-2" id="judul" name="judul"
                                value="{{ $dokumentasi->judul }}" required style="border: 2px solid #245734;">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control px-2" id="deskripsi" name="deskripsi"
                                value="{{ $dokumentasi->deskripsi }}" required style="border: 2px solid #245734;">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (jpg, png, jpeg)</label>
                            <input type="file" class="form-control px-2" id="foto" name="foto[]"
                                accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                        </div>

                        <input type="hidden" name="level" value="admin">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="adddoc" tabindex="-1" aria-labelledby="adddoc" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adddoc">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('insertdoc.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control px-2" id="judul" name="judul" required
                            style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control px-2" id="deskripsi" name="deskripsi" required
                            style="border: 2px solid #245734;">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (jpg, png,
                            jpeg)</label>
                        <input type="file" class="form-control px-2" id="foto" name="foto[]"
                            accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                    </div>
                    <input type="hidden" name="level" value="admin">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>