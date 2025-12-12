<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PelamarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pelamar;
use App\Models\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function tambah()

    {

        return view('pelamar.tambah-pengalaman');

    }

    public function store(Request $request)

    {

        $pengalaman_kerja = Session::get('pelamar_id'); // Ambil ID universitas dari session
        PengalamanKerja::create([
            'nama_instansi' => $request->nama_instansi,
            'posisi' => $request->posisi,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
            'deskripsi' => $request->deskripsi,
            'id_pelamar' => $pengalaman_kerja, // langsung pakai ID dari session
        ]);

        return redirect()->route('profile-pelamar')->with('success-pengalaman', 'Pengalaman Kerja berhasil ditambahkan');

    }

    public function edit($id)

    {

        $data = PengalamanKerja::findOrFail($id);
        return view('pelamar.edit-pengalaman', ['pengalaman_kerja' => $data]);

    }

    public function update(Request $request, $id)

    {

        $peng = PengalamanKerja::findOrFail($id);
        $peng->update([
           'nama_instansi' => $request->nama_instansi,
            'posisi' => $request->posisi,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('profile-pelamar')->with('success-pengalaman', 'Pengalaman Kerja berhasil diupdate');

    }

    public function hapus($id)

    {

        $peng = PengalamanKerja::findOrFail($id);
        $peng->delete();
        
        return redirect()->route('profile-pelamar')->with('success-pengalaman', 'Pengalaman Kerja berhasil dihapus');

    }
}
