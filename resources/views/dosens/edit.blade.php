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
                                    <h1>Edit Data Dosen</h1>
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
                                    <a href="{{ route('dosens.index') }}" class="btn btn-success btn-sm">
                                        << Kembali</a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('dosens.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="nip" class="col-md-4">NIP Dosen</label>
                                            <input type="hidden" name="id" value="{{ $dosens->id }}">
                                            <input type="text" name="nip" id="nip"
                                                value="{{ $dosens->nip }}" class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-md-4">Nama Dosen</label>
                                            <input type="text" name="nama" id="nama"
                                                value="{{ $dosens->nama }}" class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4">Email Dosen</label>
                                            <input type="text" name="email" id="email"
                                                value="{{ $dosens->email }}" class="form-control col-md-4" required>
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
