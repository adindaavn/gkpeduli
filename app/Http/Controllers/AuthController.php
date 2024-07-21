<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('auth/login', compact('users'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik'      => 'required',
            'nama'     => 'required',
        ]);

        $credentials = [
            'nik'       => $request->nik,
            'nama'      => $request->nama,
        ];

        $user = User::where($credentials)->first();

        if ($user) {
            Auth::login($user);
            return redirect('dashboard');
        }
        
        return back()->with('failed', 'NIK atau Nama salah');
    }

    public function logout() { // Revoke API token by setting it to null

        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkRegister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik'      => 'required|numeric|unique:users,nik',
            'nama'     => 'required',
        ]);

        $data['nik'] = $request->nik;
        $data['nama'] = $request->nama;

        if (User::create($data)){
            return redirect()->route('login')->with('success', 'Berhasil daftar!');;
        }else{
            return redirect()->route('register')->with('failed', 'Gagal daftar :(');
        }
        
        // $login = [
        //     'nik'       => $request->nik,
        //     'nama'      => $request->nama,
        // ];

        // if (Auth::login($login)){
        //     return redirect()->route('dashboard');
        // }else{
        //     return redirect()->route('register')->with('failed', 'NIK atau Nama salah');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
