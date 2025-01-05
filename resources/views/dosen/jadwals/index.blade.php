@extends('admin.layouts.app')
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
                                <h1 class="display-6 text-black">Jadwal Bimbingan</h1>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    {{-- Start Row --}}
                    <div class="card-body">
                        <a href="{{ route('bimbingans.create') }}" class="btn btn-primary btn-lg">+ Tambah</a>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-primary" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Bimbingan</th>
                                                <th>Jam</th>
                                                <th>Nama Dosen</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Lokasi</th>
                                                <th>Topik</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bimbingans as $bmb)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bmb->tanggal }}</td>
                                                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $bmb->jam)->format('H:i') }}</td>
                                                    <td>{{ $bmb->dosen->nama }}</td>
                                                    <td>{{ $bmb->mahasiswa->nama }}</td>
                                                    <td>{{ $bmb->lokasi }}</td>
                                                    <td>{{ $bmb->topik }}</td>
                                                    <td>
                                                        <a href="{{ route('bimbingans.edit', $bmb->id) }}"
                                                            onclick="if(!confirm('Yakin Mau di Edit nih?')) {return false}"
                                                            class="btn btn-primary btn-md"><i
                                                                class="fa-solid fa-wrench fa-rotate-270"></i></a>
                                                        <form action="{{ route('bimbingans.destroy', $bmb->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-md"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                                    class="fa-solid fa-trash"></i></button>

                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('bimbingans.create') }}" class="btn btn-primary btn-lg">+ Tambah</a>
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-primary" aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Bimbingan</th>
                                                    <th>Jam</th>
                                                    <th>Nama Dosen</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Lokasi</th>
                                                    <th>Topik</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bimbingans as $bmb)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $bmb->tanggal }}</td>
                                                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $bmb->jam)->format('H:i') }}</td>
                                                        <td>{{ $bmb->dosen->nama }}</td>
                                                        <td>{{ $bmb->mahasiswa->nama }}</td>
                                                        <td>{{ $bmb->lokasi }}</td>
                                                        <td>{{ $bmb->topik }}</td>
                                                        <td>
                                                            <a href="{{ route('bimbingans.edit', $bmb->id) }}"
                                                                onclick="if(!confirm('Yakin Mau di Edit nih?')) {return false}"
                                                                class="btn btn-primary btn-md"><i
                                                                    class="fa-solid fa-wrench fa-rotate-270"></i></a>
                                                            <form action="{{ route('bimbingans.destroy', $bmb->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-md"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                                        class="fa-solid fa-trash"></i></button>
    
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
