<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $penduduks = Penduduk::latest()->paginate(10);
        return view('pages/penduduk', compact('penduduks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nik'       => 'required|numeric|unique:penduduks,nik',
            'nama'      => 'required|max:100',
            'alamat'    => 'required',
            'jk'        => 'required'
        ]);

        Penduduk::create([
            'nik'       => $request->nik,
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'jk'        => $request->jk
        ]);

        return redirect('penduduk')->with(['success' => 'Penduduk berhasil didaftarkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk, $id)
    {
        $penduduk = Penduduk::findOrFail($id); // Find resident by ID or fail with 404
        return view('pages.penduduk', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:penduduks,nik,' . $id, // Unique validation excluding current ID
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'jk' => 'required'
        ]);

        $penduduk = Penduduk::findOrFail($id); 
        $penduduk->update($request->all());

        return redirect('penduduk')->with(['success' => 'Penduduk berhasil diubah!']);

        // $data['nik'] = $request->nik;
        // $data['nama'] = $request->nama;
        // $data['alamat'] = $request->alamat;
        // $data['jk'] = $request->jk;

        // Penduduk::find($id)->Update($request->all());
        // return redirect(('penduduk'))->with('success', 'Penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect('penduduk')->with(['success' => 'Penduduk berhasil dihapus!']);
    }
}
