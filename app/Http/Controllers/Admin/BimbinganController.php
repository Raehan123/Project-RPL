<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailNotification;
use App\Mail\Notification;
use App\Mail\SendNotification;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BimbinganController extends Controller
{
    public function index()
    {
        $bimbingans = Bimbingan::all();
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('admin.bimbingans.index', compact('bimbingans', 'mahasiswas', 'dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        return view('admin.bimbingans.create', compact('dosens', 'mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required|date_format:H:i',
        'jam_bimbingan' => 'required|date_format:H:i',
        'dosen_id' => 'required|exists:dosens,id',
        'mahasiswa_id' => 'required|exists:mahasiswas,id',
        'lokasi' => 'required|string|max:255',
        'topik' => 'required|string|max:255',
    ]);
    if (isset($request->id)) {
        $bimbingans = Bimbingan::find($request->id);
        $bimbingans->update($data);
    } else {
        Bimbingan::create($data);
    }

    $sendAt = now()->addMinutes(1);

    // Kirim job untuk mengirim email
    SendEmailNotification::dispatch($bimbingans)->delay($sendAt);

    return redirect()->route('admin.bimbingans.index')
        ->with('success', 'Data berhasil disimpan dan email akan dikirim 1 jam sebelum bimbingan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bimbingans = Bimbingan::find($id);
        if (!$bimbingans) {
            return redirect()->back();
        }
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        return view('admin.bimbingans.edit', compact('dosens', 'mahasiswas', 'bimbingans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bimbingans = Bimbingan::find($id);
        if (!$bimbingans) {
            return redirect()->route('admin.bimbingans.index')->with('error', 'Data tidak ditemukan');
        }

        $data = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'jam_bimbingan' => 'required|date_format:H:i',
            'dosen_id' => 'required|exists:dosens,id',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'lokasi' => 'required|string|max:255',
            'topik' => 'required|string|max:255',
        ]);

        $bimbingans->update($data);

        return redirect()->route('admin.bimbingans.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bimbingans = Bimbingan::find($id);
        if ($bimbingans) {
            $bimbingans->delete();
            return redirect()->route('admin.bimbingans.index')->with('success', 'Data berhasil dihapus');
        }
    }

    public function Notification($id)
    {
        // Ambil data mahasiswa dan dosen berdasarkan ID masing-masing
        $mahasiswas = Mahasiswa::find($id);
        $dosens = Dosen::find($id);

        // Pastikan data mahasiswa dan dosen ditemukan
        if (!$mahasiswas || !$dosens) {
            return redirect()->back()->with('error', 'Mahasiswa atau Dosen tidak ditemukan!');
        }

        // Kirim data ke view
        return view('email.notification', compact('mahasiswas', 'dosens'));
    }
}
