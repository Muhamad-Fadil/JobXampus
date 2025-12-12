<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PelamarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pelamar;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function tambah()

    {

        return view('pelamar.tambah-pendidikan');

    }

    public function store(Request $request)

    {

        $pendidikan = Session::get('pelamar_id'); // Ambil ID universitas dari session
        Pendidikan::create([
            'nama_institusi' => $request->nama_institusi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
            'id_pelamar' => $pendidikan, // langsung pakai ID dari session
        ]);

        return redirect()->route('profile-pelamar')->with('success-pendidikan', 'Pendidikan Kerja berhasil ditambahkan');

    }

    public function edit($id)

    {

        $data = Pendidikan::findOrFail($id);
        return view('pelamar.edit-pendidikan', ['pendidikan' => $data]);

    }

    public function update(Request $request, $id)

    {

        $pen = Pendidikan::findOrFail($id);
        $pen->update([
           'nama_institusi' => $request->nama_institusi,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return redirect()->route('profile-pelamar')->with('success-pendidikan', 'Pendidikan Kerja berhasil diupdate');

    }

    public function hapus($id)

    {

        $pen = Pendidikan::findOrFail($id);
        $pen->delete();

        return redirect()->route('profile-pelamar')->with('success-pendidikan', 'Pendidikan Kerja berhasil dihapus');
        
    }
}
