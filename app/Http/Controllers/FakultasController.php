<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fakultas::orderByDesc("created_at")->paginate(10); // Tambah pagination
        return view('fakultas.list-fakultas', ['fakultas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.add-fakultas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // PERBAIKAN: Max karakter diubah dari 5 menjadi 100 (lebih realistis)
        $validated = $request->validate([
            'nama_fakultas' => ['required', 'max:100', 'unique:fakultas'], // Tambah unique
            'nama_dekan' => ['required', 'max:100']
        ], [
            'nama_fakultas.required' => 'Nama Fakultas Wajib Di Isi',
            'nama_dekan.required' => 'Nama Dekan Wajib Di Isi',
            'nama_fakultas.max' => 'Nama Fakultas Maksimal 100 Karakter',
            'nama_dekan.max' => 'Nama Dekan Maksimal 100 Karakter',
            'nama_fakultas.unique' => 'Nama Fakultas Sudah Terdaftar' // Tambah pesan unique
        ]);

        try {
            Fakultas::create([
                'nama_fakultas' => $request->nama_fakultas,
                'nama_dekan' => $request->nama_dekan
            ]);
            
            // Tambah feedback sukses
            return redirect('/fakultas')->with('success', 'Data Fakultas Berhasil Disimpan!');
        } catch (\Exception $e) {
            // Tambah feedback error
            return redirect()->back()->with('error', 'Gagal Menyimpan Data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakulta)
    {
        return view('fakultas.detail-fakultas', ['fakultas' => $fakulta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakulta)
    {
        return view('fakultas.edit-fakultas', [
            'fakultas' => $fakulta
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakulta)
    {
        // PERBAIKAN: Validasi unique dengan mengabaikan ID sendiri
        $validated = $request->validate([
            'nama_fakultas' => ['required', 'max:100', 'unique:fakultas,nama_fakultas,' . $fakulta->id],
            'nama_dekan' => ['required', 'max:100']
        ], [
            'nama_fakultas.required' => 'Nama Fakultas Wajib Di Isi',
            'nama_dekan.required' => 'Nama Dekan Wajib Di Isi',
            'nama_fakultas.max' => 'Nama Fakultas Maksimal 100 Karakter',
            'nama_dekan.max' => 'Nama Dekan Maksimal 100 Karakter',
            'nama_fakultas.unique' => 'Nama Fakultas Sudah Terdaftar'
        ]);

        try {
            $fakulta->update([
                'nama_fakultas' => $request->nama_fakultas,
                'nama_dekan' => $request->nama_dekan
            ]);

            // Tambah feedback sukses
            return redirect('/fakultas')->with('success', 'Data Fakultas Berhasil Diupdate!');
        } catch (\Exception $e) {
            // Tambah feedback error
            return redirect()->back()->with('error', 'Gagal Mengupdate Data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakulta)
    {
        try {
            $fakulta->delete();
            // Tambah feedback sukses
            return redirect()->back()->with('success', 'Data Fakultas Berhasil Dihapus!');
        } catch (\Exception $e) {
            // Tambah feedback error
            return redirect()->back()->with('error', 'Gagal Menghapus Data: ' . $e->getMessage());
        }
    }
}   