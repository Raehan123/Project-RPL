<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')->get();
        return view('admin.mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50',
            'nim' => 'required|min:8|max:16|unique:mahasiswas,nim',
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data ke tabel users
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'mahasiswa',
            ]);

            // Simpan data ke tabel mahasiswas
            Mahasiswa::create([
                'nim' => $data['nim'],
                'nama' => $data['name'],
                'jurusan' => $data['jurusan'],
                'email' => $data['email'],
                'user_id' => $user->id,
            ]);

            DB::commit();

            return redirect()->route('mahasiswas.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('mahasiswas.index')->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswas = Mahasiswa::with('user')->findOrFail($id);
        return view('admin.mahasiswas.edit', compact('mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|min:3|max:50',
            'nim' => 'required|min:8|max:16|unique:mahasiswas,nim,' . $mahasiswas->id,
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $mahasiswas->user_id,
            'password' => 'nullable|min:8',
        ]);

        DB::beginTransaction();

        try {
            // Update data di tabel users
            $password = $data['password'] ? Hash::make($data['password']) : $mahasiswas->user->password;
            $mahasiswas->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
            ]);

            // Update data di tabel mahasiswas
            $mahasiswas->update([
                'nim' => $data['nim'],
                'jurusan' => $data['jurusan'],
            ]);

            DB::commit();

            return redirect()->route('mahasiswas.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('mahasiswas.index')->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Hapus user terkait
            $mahasiswa->user->delete();
            // Hapus data mahasiswa
            $mahasiswa->delete();

            return redirect()->route('mahasiswas.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswas.index')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
