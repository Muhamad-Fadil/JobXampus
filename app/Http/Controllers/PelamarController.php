<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UniversitasController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Universitas;
use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\PengalamanKerja;
use App\Models\Pendidikan;

class PelamarController extends Controller
{

    public function home()

    {
        // Ambil 6 lowongan random beserta data universitas-nya
        $lowongan = Lowongan::with('universitas')->inRandomOrder()->limit(3)->get();

        return view('pelamar.home-pelamar', compact('lowongan'));

    }

    public function profilePelamar()

    {
        $pelamarId = Session::get('pelamar_id');
        $pelamar = Pelamar::find($pelamarId);
        Session::put('pelamar', $pelamar->nama);
        Session::put('pelamar_pic', $pelamar->profile_pic);

        $pengalamanKerja = PengalamanKerja::where('id_pelamar', $pelamarId)->get();
        $pendidikan = Pendidikan::where('id_pelamar', $pelamarId)->get();

        return view('pelamar.profile-pelamar', compact('pelamar', 'pengalamanKerja', 'pendidikan'));

    }

    public function edit()

    {

        $pelamarId = Session::get('pelamar_id');
        $pelamar = Pelamar::find($pelamarId);

        // Pastikan $universitas tidak null, atau handle kondisi null jika perlu

        return view('pelamar.edit-pelamar', compact('pelamar'));

    }


    public function update(Request $request)

    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'ringkasan_profil' => 'required',
        ]);

        $pelamarId = Session::get('pelamar_id');
        $pelamar = Pelamar::find($pelamarId);

        if ($request->hasFile('profile_pic')) {
            // Hapus logo lama jika ada
            if ($pelamar->profile_pic && file_exists(public_path('img/' . $pelamar->profile_pic))) {
                unlink(public_path('img/' . $pelamar->profile_pic));
            }

            $file = $request->file('profile_pic');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $pelamar->profile_pic = $filename;
        }
        
        $pelamar->fill($request->except('profile_pic'));
        $pelamar->save();

        return redirect()->route('profile-pelamar')->with('success', 'Profil berhasil diperbarui!');

    }

    public function universitas() 

    {

        $universitas = Universitas::all();
        $lowongan = Lowongan::all(); // Tambahkan ini

        return view('pelamar.universitas-pelamar', compact('universitas', 'lowongan'));

    }


    public function lowongan()

    {

        $lowongan = Lowongan::with('universitas')->get();
            $pelamar = Pelamar::where('id_pelamar', auth()->id())->first();

        return view('pelamar.lowongan-pelamar', compact('lowongan'));
        
    }


}
