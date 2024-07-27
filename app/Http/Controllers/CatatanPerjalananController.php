<?php

namespace App\Http\Controllers;

use App\Imports\CatatanImport;
use App\Models\CatatanPerjalanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CatatanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $catatans = CatatanPerjalanan::latest()->paginate(10);
        return view('pages/catatan', compact('catatans', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'tanggal'  => 'required',
            'jam'      => 'required',
            'lokasi'   => 'required',
            'suhu'     => 'required'
        ]);

        $nik = Auth::user()->nik;

        CatatanPerjalanan::create([
            'nik'      => $nik,
            'tanggal'  => $request->tanggal,
            'jam'      => $request->jam,
            'lokasi'   => $request->lokasi,
            'suhu'     => $request->suhu
        ]);

        return redirect('catatan')->with(['success' => 'Catatan berhasil didaftakan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(CatatanPerjalanan $catatanPerjalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanPerjalanan $catatanPerjalanan, $id)
    {
        $catatan = CatatanPerjalanan::findOrFail($id); // Find resident by ID or fail with 404
        return view('pages.catatan', compact('catatan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal'  => 'required',
            'jam'      => 'required',
            'lokasi'   => 'required',
            'suhu'     => 'required'
        ]);

        $catatan = CatatanPerjalanan::findOrFail($id);
        $catatan->update($request->all());

        return redirect('catatan')->with(['success' => 'Catatan berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catatan = CatatanPerjalanan::findOrFail($id);
        $catatan->delete();

        return redirect('catatan')->with(['success' => 'Catatan berhasil dihapus!']);
    }


    public function importData(Request $request)
    {

        // dd($request->all);
        $request->validate([
            'import' => 'required|file|mimes:xlsx,csv,xls|max:2048'
        ]);

        $file = $request->file('import');

        Excel::import(new CatatanImport, $file);

        return redirect()->back()->with('success', 'Import data berhasil!');
    }
}
