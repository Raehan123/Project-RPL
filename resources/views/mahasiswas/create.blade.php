@extends('dashboard.layouts.app')

@section('content')
    <div class="layout-wrapper">
        <!-- Begin page -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h2 class=" text-black">Tambah Mahasiswa</h2>
                            </div>
                        </div>
                    </div>
                    <!-- End page title -->

                    <!-- Start Row -->
                    <div class="row mt-5">
                        <div class="col-md-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class= "d-flex  text-black">Tambah Mahasiswa</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('mahasiswas.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nama" class="col-2 col-form-label">Nama</label>
                                            <div class="col-10">
                                                <input id="nama" name="nama" placeholder="Masukkan nama"
                                                    type="text" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nim" class="col-2 col-form-label">NIM</label>
                                            <div class="col-10">
                                                <input id="nim" name="nim" placeholder="Masukkan NIM"
                                                    type="text" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="jurusan" class="col-2 col-form-label">Program Studi</label>
                                            <div class="col-10">
                                                <select name="jurusan" id="jurusan" class="form-control" required>
                                                    <option value="" hidden>Pilih Prodi</option>
                                                    <option value="TI">Teknik Informatika</option>
                                                    <option value="SI">Sistem Informasi</option>
                                                    <option value="BD">Bisnis Digital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="email" class="col-2 col-form-label">Email</label>
                                            <div class="col-10">
                                                <input id="email" name="email" placeholder="Masukkan email"
                                                    type="text" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Kirim</button>
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
            <!-- End main content-->
        </div>
    </div>
@endsection
