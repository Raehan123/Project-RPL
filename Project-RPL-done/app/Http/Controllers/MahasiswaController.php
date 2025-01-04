<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|min:8|max:16',
            'nama' => 'required|min:3|max:50',
            'jurusan' => 'required|string',
            'email' => 'required|email',
        ]);

        if (isset($request->id)) {
            $mahasiswas = Mahasiswa::find($request->id);
            $mahasiswas->update($data);
        } else {
            Mahasiswa::create($data);
        }

        return redirect()->route('mahasiswas.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        return view('mahasiswas.edit', compact('mahasiswas'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswas = Mahasiswa::find($id);
        if ($mahasiswas) {
            $mahasiswas->delete();
            return redirect()->route('mahasiswas.index')->with('success', 'Data berhasil dihapus');
        };
    }
}
