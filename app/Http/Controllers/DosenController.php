<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|min:8|max:16',
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
        ]);

        if (isset($request->id)) {
            $dosens = Dosen::find($request->id);
            $dosens->update($data);
        } else {
            Dosen::create($data);
        }

        return redirect()->route('dosens.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $dosens = Dosen::findOrFail($dosen->id);
        return view('dosens.edit', compact('dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosens = Dosen::find($id);
        if ($dosens) {
            $dosens->delete();
            return redirect()->route('dosens.index')->with('success', 'Data berhasil dihapus');
        }
    }
}
