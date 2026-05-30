<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index(): View
    {
        $prodis = Prodi::with('fakultas')->latest()->paginate(10);
        return view('prodi.index', compact('prodis'));
    }

    public function create(): View
    {
        $listfakultas = Fakultas::all();

        return view('prodi.create', compact('listfakultas'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:100|unique:prodis',
            'nama_kaprodi' => 'required|string|max:100',
            'alias_prodi' => 'required|string|max:10|unique:prodis',
            'fakultas_id' => 'required|exists:fakultas,id',
        
        ], [
            'nama_prodi.required' => 'Nama prodi wajib diisi!',
            'nama_prodi.unique' => 'Nama prodi sudah terdaftar!',
            'nama_kaprodi.required' => 'Nama kaprodi wajib diisi!',
            'alias_prodi.required' => 'Alias prodi wajib diisi!',
            'alias_prodi.unique' => 'Alias prodi sudah terdaftar!',
            'fakultas_id.required' => 'Fakultas wajib dipilih!'
        ]);
        $photoKaprodi = Storage::disk("public")->putFile("prodi",$request->file("photo_kaprodi"));
        
        $validated["photo_kaprodi"] =$photoKaprodi;
      
        prodi::create($validated);

     

        try {
            Prodi::create($request->all());
            return redirect()->route('prodi.index')
                ->with('success', 'Data prodi berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Prodi $prodi): View
    {
        return view('prodi.show', compact('prodi'));
    }

    public function edit(Prodi $prodi): View
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, Prodi $prodi): RedirectResponse
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:100|unique:prodis,nama_prodi,' . $prodi->id,
            'nama_kaprodi' => 'required|string|max:100',
            'alias_prodi' => 'required|string|max:10|unique:prodis,alias_prodi,' . $prodi->id,
            'fakultas_id' => 'required|exists:fakultas,id',
             "photo_kaprodi"=> "required|mimetypes:image/*"
        ], [
            'nama_prodi.required' => 'Nama prodi wajib diisi!',
            'nama_prodi.unique' => 'Nama prodi sudah terdaftar!',
            'nama_kaprodi.required' => 'Nama kaprodi wajib diisi!',
            'alias_prodi.required' => 'Alias prodi wajib diisi!',
            'alias_prodi.unique' => 'Alias prodi sudah terdaftar!',
            'fakultas_id.required' => 'Fakultas wajib dipilih!'
        ]);
        
        try {
            $prodi->update($request->all());
            return redirect()->route('prodi.index')
                ->with('success', 'Data prodi berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Prodi $prodi): RedirectResponse
    {
        try {
            $prodi->delete();
            return redirect()->route('prodi.index')
                ->with('success', 'Data prodi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}