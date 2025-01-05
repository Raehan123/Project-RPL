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
                                    <h1>Tambah Dosen</h1>
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
                                    <h4 class="d-flex text-black">Tambah Dosen</h4>
                                </div>
                                <hr>

                                <div class="card-body">
                                    <form action="{{ route('dosens.store') }}" method="POST">
                                        @csrf
                                        <!-- NIP -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nip" class="col-2 col-form-label">NIP</label>
                                            <div class="col-10">
                                                <input id="nip" name="nip" placeholder="Masukkan NIP"
                                                    type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Nama -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="name" class="col-2 col-form-label">Nama Dosen</label>
                                            <div class="col-10">
                                                <input id="name" name="name" placeholder="Masukkan nama"
                                                    type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="email" class="col-2 col-form-label">Email</label>
                                            <div class="col-10">
                                                <input id="email" name="email" placeholder="Masukkan email"
                                                    type="email" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="password" class="col-2 col-form-label">Password</label>
                                            <div class="col-10">
                                                <input id="password" name="password" placeholder="Masukkan password"
                                                    type="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <a href="{{ route('dosens.index') }}" class="btn btn-danger">Batal</a>
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
