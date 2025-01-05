@extends('admin.layouts.app')

@section('content')
    <div class="layout-wrapper">
        <!-- Begin page -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <h1>Edit Mahasiswa</h1>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- end page title -->

                    <!-- Start Row -->
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="d-flex text-black">Edit Mahasiswa</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('mahasiswas.update', $mahasiswas->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Method spoofing untuk PUT -->

                                        <!-- Nama -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nama" class="col-2 col-form-label">Nama</label>
                                            <div class="col-10">
                                                <input id="nama" name="name" placeholder="Masukkan nama"
                                                    type="text" required class="form-control"
                                                    value="{{ $mahasiswas->user->name }}">
                                            </div>
                                        </div>

                                        <!-- NIM -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nim" class="col-2 col-form-label">NIM</label>
                                            <div class="col-10">
                                                <input id="nim" name="nim" placeholder="Masukkan NIM"
                                                    type="text" class="form-control" value="{{ $mahasiswas->nim }}" required>
                                            </div>
                                        </div>

                                        <!-- Program Studi -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="jurusan" class="col-2 col-form-label">Program Studi</label>
                                            <div class="col-10">
                                                <select name="jurusan" id="jurusan" class="form-control" required>
                                                    <option value="TI" {{ $mahasiswas->jurusan == 'TI' ? 'selected' : '' }}>Teknik Informatika</option>
                                                    <option value="SI" {{ $mahasiswas->jurusan == 'SI' ? 'selected' : '' }}>Sistem Informasi</option>
                                                    <option value="BD" {{ $mahasiswas->jurusan == 'BD' ? 'selected' : '' }}>Bisnis Digital</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="email" class="col-2 col-form-label">Email</label>
                                            <div class="col-10">
                                                <input id="email" name="email" placeholder="Masukkan email"
                                                    type="email" class="form-control" value="{{ $mahasiswas->user->email }}" required>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="password" class="col-2 col-form-label">Password</label>
                                            <div class="col-10">
                                                <input id="password" name="password" placeholder="Masukkan password baru (Opsional)"
                                                    type="password" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Tombol Submit -->
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <a href="{{ route('mahasiswas.index') }}" class="btn btn-danger">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with
                                    <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
    </div>
@endsection
