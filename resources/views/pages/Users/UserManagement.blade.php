<x-layout bodyClass="g-sidenav-show  bg-gray-50">

    <x-navbars.sidebar activePage="UserManagement"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->



        <div class="container-fluid py-4">
            <h4 style="color: #245734;" class="m-0">DATA CUSTOMER</h4>
            <div class="card my-4">
                <div class="row">

                    <div class="col-3">
                        <div class=" me-3 my-3 text-end d-flex mx-3">
                            <form action="{{ route('UserManagement') }}" method="GET" class="input-group input-group-outline">
                                <label class="form-label"></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Searching...">
                                    <input type="hidden" name="role" value="customer"> <!-- Menambahkan filter untuk mencari data customer -->
                                    <button class="py-1" type="submit" class="btn" style="background-color: #245734; border-radius: 10%;">
                                        <i class="fas fa-search" style="color: white;"></i> <!-- Menggunakan Font Awesome icon search -->
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
                                        PHOTO
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        NAMA
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        EMAIL
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        PHONE
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        ALAMAT
                                    </th>
                                    {{-- <th class="text-center text-uppercase  text-xxs font-weight-bolder m-0">
                                        ACTION
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if($user->level == 'user')
                                <tr>
                                    <td class="text-center" contenteditable="true">{{ $user->id }}</td>
                                    <td class="text-center" contenteditable="true">
                                        <img src="{{ asset('assets/img/profile/' . $user->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $user->name }}">
                                    </td>
                                    <td class="text-center" contenteditable="true">{{ $user->name }}</td>
                                    <td class="text-center" contenteditable="true">{{ $user->email }}</td>
                                    <td class="text-center" contenteditable="true">{{ $user->phone }}</td>
                                    <td class="text-center" contenteditable="true">{{ $user->alamat }}</td>
                                    {{-- <td class="text-center">
                                        <form action="{{ url('/category', ['id' => $user->id]) }}" method="post" onclick="return confirm('Yakin ingin menghapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-link delete-button" data-original-title="" title="" data-id="{{ $user->id }}">
                                                <i class="material-icons">delete</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </form>
                                    </td> --}}
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



        <div class="container-fluid py-4">
            <h4 style="color: #245734;" class="m-0">DATA ADMIN</h4>
            <div class="card my-4">
                <div class="row">
                    

                    <div class="col-3">

                    </div>
                    <div class="col-2">

                    </div>
                    <div class="col-7">
                        <div class="me-3 my-3 text-end">
                            <a class="btn btn-success btn-link" data-bs-toggle="modal" data-bs-target="#addAdminUserModal">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah
                            </a>
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
                                        PHOTO
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        NAMA
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        EMAIL
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        PHONE
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder ">
                                        ALAMAT
                                    </th>
                                    <th class="text-center text-uppercase  text-xxs font-weight-bolder m-0">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                @if($admin->status == 'admin')
                                <tr>
                                    <td class="text-center" contenteditable="true">{{ $admin->id }}</td>
                                    <td class="text-center" contenteditable="true">
                                        <img src="{{ asset('assets/img/profile/' . $admin->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $admin->photo }}">
                                    </td>
                                    <td class="text-center" contenteditable="true">{{ $admin->name }}</td>
                                    <td class="text-center" contenteditable="true">{{ $admin->email }}</td>
                                    <td class="text-center" contenteditable="true">{{ $admin->phone }}</td>
                                    <td class="text-center" contenteditable="true">{{ $admin->alamat }}</td>
                                    <td class="text-center">
                                        <form action="{{ url('/category', ['id' => $admin->id]) }}" method="post" onclick="return confirm('Yakin ingin menghapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-link delete-button" data-original-title="" title="" data-id="{{ $admin->id }}">
                                                <i class="material-icons">delete</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </form>
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
    </main>


</x-layout>
<!-- Modal -->
<div class="modal fade" id="addAdminUserModal" tabindex="-1" aria-labelledby="addAdminUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminUserModalLabel">Tambah Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin-user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control px-2" id="name" name="name" required style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control px-2" id="email" name="email" required style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control px-2" id="phone" name="phone" style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control px-2" id="alamat" name="alamat" style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control px-2" id="password" name="password" required style="border: 2px solid #245734;">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto (jpg, png, jpeg)</label>
                        <input type="file" class="form-control px-2" id="photo" name="photo[]" accept=".jpg, .jpeg, .png" style="border: 2px solid #245734;">
                    </div>


                    <input type="hidden" name="level" value="admin">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
