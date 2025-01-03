@extends('dashboard.layouts.app')
@section('content')
    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h1 class="display-6 text-black">Daftar Dosen</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    {{-- Start Row --}}
                    <div class="card-body">
                        <a href="{{ route('dosens.create') }}" class="btn btn-primary btn-lg">+ Tambah</a>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example2"
                                        class="table table-primary"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama Dosen</th>
                                                <th>Email Dosen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosens as $dsn)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dsn->nip }}</td>
                                                    <td>{{ $dsn->nama }}</td>
                                                    <td>{{ $dsn->email }}</td>
                                                    <td>
                                                        <a href="{{ route('dosens.edit', $dsn->id) }}"
                                                            onclick="if(!confirm('Yakin Mau di Edit nih?')) {return false}"
                                                            class="btn btn-primary btn-md"><i class="fa-solid fa-wrench fa-rotate-270"></i></a>
                                                        <form action="{{ route('dosens.destroy', $dsn->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-md"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-solid fa-trash"></i></button>
                                                                
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
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
                                    <i class="mdi mdi-fish text-warning"></i> by Nemo.</span>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
    </div>
    <!-- END layout-wrapper -->
@endsection
