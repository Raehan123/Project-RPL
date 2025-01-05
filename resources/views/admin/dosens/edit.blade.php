@extends('admin.dashboard.layouts.app')

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
                                    <h1>Edit Dosen</h1>
                                </div>

                            </div>
                        </div>
                    </section>
                    <!-- end page title -->
                    {{-- Start Row --}}
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class= "d-flex text-black">Edit Dosen</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.dosens.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row mb-3 align-items-center">
                                            <input type="hidden" name="id" value="{{ $dosens->id }}">
                                            <label for="nip" class="col-2 col-form-label">NIP</label>
                                            <div class="col-10">
                                                <input id="nip" name="nip" placeholder="Masukkan NIP"
                                                    type="text" class="form-control" value="{{ $dosens->nip }}"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="nama" class="col-2 col-form-label">Nama Dosen</label>
                                            <div class="col-10">
                                                <input id="nama" name="nama" placeholder="Masukkan nama"
                                                    type="text" required="required" value="{{ $dosens->nama }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="email" class="col-2 col-form-label">Email</label>
                                            <div class="col-10">
                                                <input id="email" name="email" placeholder="Masukkan email"
                                                    type="text" required="required" value="{{ $dosens->email }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <a href="{{ route('admin.dosens.index') }}" class="btn btn-danger">Batal</a>
                                        </div>
                                    </form>
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
