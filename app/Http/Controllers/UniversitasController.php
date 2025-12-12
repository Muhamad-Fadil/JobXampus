<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LamaranController;
use App\Models\Universitas;
use App\Models\Lowongan;
use App\Models\Lamaran;


class UniversitasController extends Controller
{
    public function home(Request $request)
    
    {

        if (!Session::has('universitas')) {
            return redirect('/login-universitas')->withErrors(['akses' => 'Silakan login terlebih dahulu']);
        }

        $universitasId = Session::get('universitas_id');

        // $universitas = (object) Session::get('universitas', 'universitas_logo');
        $universitas = Universitas::find($universitasId);
        Session::put('universitas_logo', $universitas->logo);

        // Ambil keyword dari query string
        $search = $request->input('search');

        // Ambil semua lowongan universitas
        $lowongan = collect(); // Default kosong
        if ($search) {
            $lowongan = Lowongan::where('id_universitas', $universitasId)
                ->where(function ($query) use ($search) {
                    $query->where('nama_lowongan', 'like', "%$search%");
                })
                ->get();
        }

        // Ambil 10 lowongan terbaru
        $lowonganTerbaru = Lowongan::where('id_universitas', $universitasId)
                                ->orderBy('id_lowongan', 'desc')
                                ->limit(10)
                                ->get();

        return view('universitas.home-universitas', [
            'universitas' => $universitas,
            'lowonganTerbaru' => $lowonganTerbaru,
            'lowongan' => $lowongan,
            'search' => $search
        ]);

    }


    public function tentangUniversitas()

    {

        $universitasId = Session::get('universitas_id');
        
        $universitas = Universitas::find($universitasId);
        Session::put('universitas', $universitas->nama_universitas);
        Session::put('universitas_logo', $universitas->logo);

        return view('universitas.tentang-universitas', compact('universitas'));

    }

    public function edit()

    {

        $universitasId = Session::get('universitas_id');
        $universitas = Universitas::find($universitasId);

        // Pastikan $universitas tidak null, atau handle kondisi null jika perlu

        return view('universitas.edit-profile', compact('universitas'));

    }


    public function update(Request $request)

    {

        $request->validate([
            'nama_universitas' => 'required',
            'email' => 'required|email',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'alamat_website' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'kota' => 'nullable|string',
        ]);

        $universitasId = Session::get('universitas_id');
        $universitas = Universitas::find($universitasId);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($universitas->logo && file_exists(public_path('img/' . $universitas->logo))) {
                unlink(public_path('img/' . $universitas->logo));
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $universitas->logo = $filename;
        }
        
        $universitas->fill($request->except('logo'));
        $universitas->save();

        return redirect()->route('tentang-universitas')->with('success', 'Profil berhasil diperbarui!');

    }

    public function lihatPelamarSession()

    {

        $id_universitas = session('universitas_id');
        $universitas = (object) Session::get('universitas', 'universitas_logo');

        $lamaran = Lamaran::whereHas('lowongan', function ($query) use ($id_universitas) {
            $query->where('id_universitas', $id_universitas);
        })
        ->where('status', 'Menunggu') // hanya pelamar yang belum diproses
        ->with('pelamar', 'lowongan')
        ->get();

        return view('universitas.list-pelamar', compact('lamaran'));

    }

    public function terimaLamaran($id)

    {

        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = 'Diterima';
        $lamaran->save();

        return back()->with('success', 'Lamaran diterima.');

    }

    public function tolakLamaran($id)

    {

        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = 'Ditolak';
        $lamaran->save();

        return back()->with('success', 'Lamaran ditolak.');

    }

    public function lihatKaryawan()

    {

        $id_universitas = session('universitas_id');

        $lamaran = Lamaran::whereHas('lowongan', function ($query) use ($id_universitas) {
            $query->where('id_universitas', $id_universitas);
        })
        ->where('status', 'Diterima') // hanya yang sudah diterima
        ->with('pelamar', 'lowongan')
        ->get();

        return view('universitas.list-karyawan', compact('lamaran'));

    }

    public function getLowongan()

    {

        return response()->json(\App\Models\Lowongan::all());

    }

}
