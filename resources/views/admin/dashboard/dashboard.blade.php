@extends('admin.dashboard.layouts.app')

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
                                <li class="breadcrumb-item active">Welcome to the FinalEase Dashboard</li>
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
                                        <i class="fa-solid fa-user-graduate fa-2x mt-3"></i>
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Mahasiswa</h5>
                                    <h4 class="fw-medium font-size-24">{{ $jumlahMahasiswa }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <i class="fa-solid fa-user-tie fa-2x mt-3"></i>
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Dosen</h5>
                                    <h4 class="fw-medium font-size-24">{{ $jumlahDosen }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <i class="fa-regular fa-calendar-days fa-2x mt-3"></i>
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">Jadwal Bimbingan</h5>
                                    <h4 class="fw-medium font-size-24">{{ $jumlahJadwalBimbingan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="calendar">
                            <div class="calendar-header bg-primary">

                                <button onclick="changeMonth(-1)" class="btn btn-primary" id="prev-month">&lt;< </button>
                                        <h2 id="month-name">Desember 2024</h2>
                                        <button onclick="changeMonth(1)" class="btn btn-primary"
                                            id="next-month">>&gt;</button>
                            </div>

                            <div class="calendar-days bg-secondary">
                                <div class="calendar-day">Min</div>
                                <div class="calendar-day">Sen</div>
                                <div class="calendar-day">Sel</div>
                                <div class="calendar-day">Rab</div>
                                <div class="calendar-day">Kam</div>
                                <div class="calendar-day">Jum</div>
                                <div class="calendar-day">Sab</div>
                            </div>

                            <div id="calendar-body" class="calendar-body">

                            </div>
                        </div>
                    </div>
                </div>
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
