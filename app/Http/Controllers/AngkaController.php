<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngkaController extends Controller
{
    public function showForm()
    {
        return view('cek_angka');
    }

    public function cekAngka(Request $request)
    {
        $request->validate([
            'angka' => 'required|numeric',
        ]);

        $angka = $request->input('angka');
        $hasil = ($angka % 2 == 0) ? 'Genap' : 'Ganjil';
        return back()->with('hasil', $hasil);
    }
}