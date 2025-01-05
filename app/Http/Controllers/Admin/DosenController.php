<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::with('user')->get();
        return view('admin.dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50',
            'nip' => 'required|min:3|max:16|unique:dosens,nip',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8', // Password tanpa konfirmasi
        ]);

        DB::beginTransaction();

        try {
            // Simpan data ke tabel users
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'dosen',
            ]);

            // Simpan data ke tabel dosens
            Dosen::create([
                'nip' => $data['nip'],
                'nama' => $data['name'],
                'email' => $data['email'],
                'user_id' => $user->id,
            ]);

            DB::commit();

            return redirect()->route('dosens.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dosens.index')->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = Dosen::with('user')->findOrFail($id);
        return view('admin.dosens.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|min:3|max:50',
            'nip' => 'required|min:3|max:16|unique:dosens,nip,' . $dosen->id,
            'email' => 'required|email|unique:users,email,' . $dosen->user_id,
            'password' => 'nullable|min:8', // Password bersifat opsional
        ]);

        DB::beginTransaction();

        try {
            // Update data di tabel users
            $password = $data['password'] ? Hash::make($data['password']) : $dosen->user->password;
            $dosen->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
            ]);

            // Update data di tabel dosens
            $dosen->update([
                'nip' => $data['nip'],
                'nama' => $data['name'],
                'email' => $data['email'],
            ]);

            DB::commit();

            return redirect()->route('dosens.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dosens.index')->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $dosen = Dosen::findOrFail($id);

            // Hapus user terkait
            $dosen->user->delete();
            // Hapus data dosen
            $dosen->delete();

            return redirect()->route('dosens.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('dosens.index')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
