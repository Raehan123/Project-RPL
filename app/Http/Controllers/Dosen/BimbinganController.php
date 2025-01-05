<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailNotification;
use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class BimbinganController extends Controller
{
    public function index()
    {
        $bimbingans = Bimbingan::all();
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('dosen.jadwal.index', compact('bimbingans', 'mahasiswas', 'dosens'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('dosen.jadwal.create', compact('mahasiswas', 'dosens'));
    }

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

    return redirect()->route('dosen.jadwal.index')
        ->with('success', 'Data berhasil disimpan dan email akan dikirim 1 jam sebelum bimbingan.');
}

    public function edit($id)
    {
        $bimbingans = Bimbingan::find($id);
        if (!$bimbingans) {
            return redirect()->back();
        }
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        return view('dosen.jadwal.edit', compact('dosens', 'mahasiswas', 'bimbingans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bimbingan = Bimbingan::find($id);
        if (!$bimbingan) {
            return redirect()->route('dosen.jadwal.index')->with('error', 'Data tidak ditemukan');
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

        $bimbingan->update($data);

        return redirect()->route('dosen.jadwal.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bimbingans = Bimbingan::find($id);
        if ($bimbingans) {
            $bimbingans->delete();
            return redirect()->route('dosen.jadwal.index')->with('success', 'Data berhasil dihapus');
        }
    }

    public function approve($id)
    {
        $bimbingans = Bimbingan::findOrFail($id);
        $bimbingans->update(['status' => 'setuju']);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal bimbingan berhasil di setujui');
    }

    public function reject($id)
    {
        $bimbingans = Bimbingan::findOrFail($id);
        $bimbingans->update(['status' => 'tolak']);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal bimbingan sudah di tolak');
    }


}
