<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Exception;

class UserController extends Controller
{
    protected $userModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => '📋 Daftar Pengguna',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function create()
    {
        return view('create_user', [
            'title' => '➕ Tambah Pengguna',
            'kelas' => $this->kelasModel->getKelas(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->userModel->create([
                'id'       => (string) Str::uuid(), // UUID manual untuk keamanan
                'nama'     => $request->input('nama'),
                'nim'      => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
            ]);

            return redirect()->route('user.index')
                ->with('success', '🎉 Pengguna berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', '❌ Gagal menambahkan pengguna! ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        return view('edit_user', [
            'title' => '✏️ Edit Pengguna',
            'user'  => $this->userModel->findOrFail($id),
            'kelas' => $this->kelasModel->getKelas(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = $this->userModel->findOrFail($id);

            $user->update([
                'nama'     => $request->input('nama'),
                'nim'      => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
            ]);

            return redirect()->route('user.index')
                ->with('success', '✅ Data pengguna berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', '⚠️ Gagal memperbarui pengguna! ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = $this->userModel->findOrFail($id);
            $user->delete();

            return redirect()->route('user.index')
                ->with('success', '🗑️ Pengguna berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('user.index')
                ->with('error', '❌ Gagal menghapus pengguna! ' . $e->getMessage());
        }
    }
}
