@extends('dashboard.layouts.app')

@section('content')
    <div class="layout-wrapper">
        <!-- Begin page -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h3 class="font-size-24 text-black">Tambah Jadwal Bimbingan</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    {{-- Start Row --}}
                    <div class="row mt-5">
                        <div class="col-12 mx-auto">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class= "d-flex text-black">Tambah Jadwal</h4>
                                </div>
                                <hr>

                                <div class="card-body">
                                    <form action="{{ route('bimbingans.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                            <div class="col-10">
                                                <input id="tanggal" name="tanggal"
                                                    type="date" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="jam" class="col-2 col-form-label">Jam Bimbingan</label>
                                            <div class="col-10">
                                                <input id="jam" name="jam"
                                                    type="time" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="dosen_id" class="col-2 col-form-label">Nama Dosen</label>
                                            <div class="col-10">
                                                <select name="dosen_id" id="dosen_id" class="form-control">
                                                    <option value="" hidden>Pilih Dosen</option>
                                                    @foreach ($dosens as $dsn)
                                                        <option value="{{ $dsn->id }}">{{ $dsn->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="mahasiswa_id" class="col-2 col-form-label">Nama Mahasiswa</label>
                                            <div class="col-10">
                                                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                                    <option value="" hidden>Pilih Mahasiswa</option>
                                                    @foreach ($mahasiswas as $mhs)
                                                        <option value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="lokasi" class="col-2 col-form-label">Lokasi</label>
                                            <div class="col-10">
                                                <input id="lokasi" name="lokasi"
                                                    type="text" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3 align-items-center">
                                            <label for="topik" class="col-2 col-form-label">Topik</label>
                                            <div class="col-10">
                                                <input id="topik" name="topik"
                                                    type="text" required="required" class="form-control">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <button type="reset" class="btn btn-danger">Batal</button>
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
