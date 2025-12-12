<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UniversitasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Lowongan;
use App\Models\Universitas;

class LowonganController extends Controller
{
    public function index()

    {
 
        $universitasId = Session::get('universitas_id', 'universitas_logo'); // ambil ID yang benar dari session

        $data = Lowongan::where('id_universitas', $universitasId)->get();

        return view('universitas.list-lowongan', ['lowongan' => $data]);

    }


    public function tambah()

    {

        return view('universitas.tambah-lowongan');

    }

    public function store(Request $request)

    {
        // Validasi input form
        $request->validate([
            'nama_lowongan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'waktu_kerja' => 'required|string|max:100',
            'kualifikasi' => 'required|string',
            'gaji' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:IT,Finance,Marketing,Design,HR,Legal,Management,Customer Service,Logistics,General,Lainnya',
        ]);

        // Ambil ID universitas dari session
        $univ = Session::get('universitas_id');

        // Simpan lowongan
        Lowongan::create([
            'nama_lowongan' => $request->nama_lowongan,
            'jabatan' => $request->jabatan,
            'waktu_kerja' => $request->waktu_kerja,
            'kualifikasi' => $request->kualifikasi,
            'gaji' => $request->gaji,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'id_universitas' => $univ,
        ]);

        return redirect()->route('list-lowongan')->with('success', 'Lowongan berhasil ditambahkan');
    }


    public function edit($id)

    {

        $data = Lowongan::findOrFail($id);
        return view('universitas.edit-lowongan', ['lowongan' => $data]);

    }

    public function update(Request $request, $id)
    
    {
        // Validasi input dari form
        $request->validate([
            'nama_lowongan' => 'required',
            'jabatan' => 'required',
            'waktu_kerja' => 'required',
            'kualifikasi' => 'required',
            'gaji' => 'required|integer',
            'deskripsi' => 'required',
            'kategori' => 'required|in:IT,Finance,Marketing,Design,HR,Legal,Management,Customer Service,Logistics,General,Lainnya',
        ]);

        // Ambil data lowongan
        $low = Lowongan::findOrFail($id);

        // Update dengan data dari request
        $low->update([
            'nama_lowongan' => $request->nama_lowongan,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'waktu_kerja' => $request->waktu_kerja,
            'kualifikasi' => $request->kualifikasi,
            'gaji' => $request->gaji,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('list-lowongan')->with('success', 'Data berhasil diperbarui.');

    }


    public function hapus($id)

    {
        $low = Lowongan::findOrFail($id);
        $low->delete();
        return redirect()->route('list-lowongan')->with('success', 'Data berhasil dihapus.');
        
    }
}
