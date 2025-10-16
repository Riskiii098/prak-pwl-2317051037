<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class MataKuliahController extends Controller
{
    /** 📋 Menampilkan daftar semua mata kuliah */
    public function index()
    {
        return view('list_mk', [
            'title' => '📘 Daftar Mata Kuliah',
            'matakuliah' => MataKuliah::all()
        ]);
    }

    /** ➕ Menampilkan form tambah mata kuliah */
    public function create()
    {
        return view('create_mk', [
            'title' => '➕ Tambah Mata Kuliah'
        ]);
    }

    /** 💾 Menyimpan data mata kuliah baru */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|integer|min:1|max:6',
            ]);

            MataKuliah::create([
                'id' => Str::uuid(), // ✅ UUID otomatis
                'nama_mk' => $request->input('nama_mk'),
                'sks' => $request->input('sks'),
            ]);

            return redirect()->route('matakuliah.index')
                ->with('success', '🎉 Mata kuliah berhasil ditambahkan!');
        } catch (Exception $e) {
            return back()->with('error', '❌ Gagal menambahkan data! ' . $e->getMessage());
        }
    }

    /** ✏️ Menampilkan form edit mata kuliah */
    public function edit(string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        return view('edit_mk', [
            'title' => '✏️ Edit Mata Kuliah',
            'matakuliah' => $matakuliah
        ]);
    }

    /** 🔄 Memperbarui data mata kuliah */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|integer|min:1|max:6',
            ]);

            $matakuliah = MataKuliah::findOrFail($id);
            $matakuliah->update([
                'nama_mk' => $request->input('nama_mk'),
                'sks' => $request->input('sks'),
            ]);

            return redirect()->route('matakuliah.index')
                ->with('success', '✅ Data mata kuliah berhasil diperbarui!');
        } catch (Exception $e) {
            return back()->with('error', '⚠️ Gagal memperbarui data! ' . $e->getMessage());
        }
    }

    /** 🗑️ Menghapus data mata kuliah */
    public function destroy(string $id)
    {
        try {
            MataKuliah::findOrFail($id)->delete();

            return redirect()->route('matakuliah.index')
                ->with('success', '🗑️ Data mata kuliah berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('matakuliah.index')
                ->with('error', '❌ Gagal menghapus data! ' . $e->getMessage());
        }
    }
}
