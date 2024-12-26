<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bimbingans = Bimbingan::all();
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('bimbingans.index', compact('bimbingans', 'mahasiswas', 'dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $mahasiswas = Mahasiswa::all();
        return view('bimbingans.create', compact('dosens', 'mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'dosen_id' => 'required',
            'mahasiswa_id' => 'required',
            'lokasi' => 'required|string|max:255',
            'topik' => 'required|string|max:255',
        ]);

        if ($request->id) {
            // Jika ID ada, lakukan update
            $bimbingan = Bimbingan::find($request->id);
            if ($bimbingan) {
                $bimbingan->update($data);
                return redirect()->route('bimbingans.index')->with('success', 'Data berhasil diperbarui');
            }
            return redirect()->route('bimbingans.index')->with('error', 'Data tidak ditemukan');
        } else {
            // Jika ID tidak ada, buat data baru
            Bimbingan::create($data);
            return redirect()->route('bimbingans.index')->with('success', 'Data berhasil disimpan');
        }
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
        return view('bimbingans.edit', compact('dosens', 'mahasiswas', 'bimbingans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bimbingan = Bimbingan::find($id);
        if (!$bimbingan) {
            return redirect()->route('bimbingans.index')->with('error', 'Data tidak ditemukan');
        }

        $data = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'dosen_id' => 'required',
            'mahasiswa_id' => 'required',
            'lokasi' => 'required|string|max:255',
            'topik' => 'required|string|max:255',
        ]);

        $bimbingan->update($data);

        return redirect()->route('bimbingans.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bimbingans = Bimbingan::find($id);
        if ($bimbingans) {
            $bimbingans->delete();
            return redirect()->route('bimbingans.index')->with('success', 'Data berhasil dihapus');
        }
    }
}
