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
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')->get();
        return view('admin.mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('admin.mahasiswas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|min:8|max:16|unique:mahasiswas,nim',
            'nama' => 'required|min:3|max:50',
            'jurusan' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data ke tabel users
            $user = User::create([
                'name' => $data['nama'], // Gunakan nama
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'mahasiswa',
            ]);

            // Simpan data ke tabel mahasiswas
            Mahasiswa::create([
                'nim' => $data['nim'],
                'nama' => $data['nama'],
                'jurusan' => $data['jurusan'],
                'email' => $data['email'],
                'user_id' => $user->id, // Ambil ID user terkait
            ]);

            DB::commit();
            return redirect()->route('admin.mahasiswas.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.mahasiswas.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $mahasiswas = Mahasiswa::with('user')->findOrFail($id);
        return view('admin.mahasiswas.edit', compact('mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|min:3|max:50',
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
                'name' => $data['nama'], // Gunakan nama
                'email' => $data['email'],
                'password' => $password,
            ]);

            // Update data di tabel mahasiswas
            $mahasiswas->update([
                'nim' => $data['nim'],
                'jurusan' => $data['jurusan'],
                'nama' => $data['nama'],
                'email' => $data['email'],
            ]);

            DB::commit();
            return redirect()->route('admin.mahasiswas.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.mahasiswas.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Hapus user terkait
            $mahasiswa->user->delete();
            // Hapus data mahasiswa
            $mahasiswa->delete();

            return redirect()->route('admin.mahasiswas.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.mahasiswas.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
