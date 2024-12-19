@extends('dashboard.layouts.app')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Dashboard</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Welcome to FinalEase Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/01.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Mahasiswa</h5>
                                    <h4 class="fw-medium font-size-24">{{ $jumlahMahasiswa }}<i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-success">
                                        <p class="mb-0">+ 12%</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="#" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/02.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Dosen</h5>
                                    <h4 class="fw-medium font-size-24">{{ $jumlahDosen }}<i
                                            class="mdi mdi-arrow-down text-danger ms-2"></i></h4>
                                    <div class="mini-stat-label bg-danger">
                                        <p class="mb-0">- 28%</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="#" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/03.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Jadwal Bimbingan</h5>
                                    <h4 class="fw-medium font-size-24">15.8 <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-info">
                                        <p class="mb-0"> 00%</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="#" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="assets/images/services-icon/04.png" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Product Sold</h5>
                                    <h4 class="fw-medium font-size-24">2436 <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-warning">
                                        <p class="mb-0">+ 84%</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="#" class="text-white-50"><i
                                                class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                    <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                {{-- Start Row --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card text-bg-primary">
                                <div class="card-header">
                                    <h3>Tambah Jadwal Bimbingan</h3>
                                </div>
                                <div class="card-body p-4">
                                    <form action="{{ route('dosens.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="tanggal">Tanggal Bimbingan</label>
                                            <input type="date" name="tanggal" id="tanggal"
                                                class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jam">Jam</label>
                                            <input type="time" name="jam" id="jam"
                                                class="form-control col-md-4" required>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email">Nama Dosen</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email">Nama Mahasiswa</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control col-md-4" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email">Status</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control col-md-4" required>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" value="Tambah" class="btn btn-dark mt-3 ">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card text-bg-primary col-md-8">
                        <div class="card-header">
                            <h3>Jadwal Bimbingan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-hover table-light"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Nama Dosen</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
                {{-- end row --}}

            </div>
            <!-- End Container -->
        </div>
        <!-- end page content-->
    </div>

    <!-- End main-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with
                        <i class="mdi mdi-fish text-warning"></i> by Nemo.</span>
                </div>
            </div>
        </div>
    </footer>

    </div>
@endsection
