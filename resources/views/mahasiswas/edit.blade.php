@extends('dashboard.layouts.app')

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
                                    <h1>Edit Data Mahasiswa</h1>
                                </div>

                            </div>
                        </div>
                    </section>
                    <!-- end page title -->
                    {{-- Start Row --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <a href="{{ route('mahasiswas.index') }}" class="btn btn-success btn-sm">
                                        << Kembali</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('mahasiswas.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="nim" class="col-md-4">NIM Mahasiswa</label>
                                            <input type="hidden" name="id" value="{{ $mahasiswas->id }}">
                                            <input type="text" name="nim" id="nim"
                                                value="{{ $mahasiswas->nim }}" class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-md-4">Nama Mahasiswa</label>
                                            <input type="text" name="nama" id="nama"
                                                value="{{ $mahasiswas->nama }}" class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jurusan" class="col-md-4">Program Studi</label>
                                            <select name="jurusan" id="jurusan" class="form-control col-md-4">
                                                <option value="" hidden>Pilih Prodi</option>
                                                    <option value="TI">Teknik Informatika</option>
                                                    <option value="SI">Sistem Informasi</option>
                                                    <option value="BD">Bisnis Digital</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4">Email Mahasiswa</label>
                                            <input type="text" name="email" id="email"
                                                value="{{ $mahasiswas->email }}" class="form-control col-md-4" required>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <input type="submit" value="Edit" class="btn btn-primary">
                                        </div>
                                    </form>
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
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
