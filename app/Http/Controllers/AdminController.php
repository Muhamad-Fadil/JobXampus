<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Pelamar;
use App\Models\Universitas;
use App\Models\Lowongan;

class AdminController extends Controller
{

    public function index()

    {
        $pelamar = Pelamar::all();
        $universitas = Universitas::all();
        $pendingPelamar = Pelamar::where('status_akun', 'pending')->get();
        $pendingUniversitas = Universitas::where('status', 'pending')->get();
        return view('admin.admin-home', compact('pelamar', 'universitas', 'pendingPelamar', 'pendingUniversitas'));
    }

    public function hapus($id)

    {
        $pel = Pelamar::findOrFail($id);
        $pel->delete();
        return redirect()->route('admin-home')->with('success', 'Pelamar berhasil dihapus');
    }

    public function hapusUniversitas($id)

    {
        $univ = Universitas::findOrFail($id);
        $univ->delete();

        return redirect()->route('admin-home')->with('success', 'Universitas berhasil dihapus');
    }

    public function konfirmasiPelamar($id)

    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->status_akun = 'active';
        $pelamar->save();

        return redirect()->route('admin-home')->with('success', 'Pelamar berhasil dikonfirmasi');
    }

    public function konfirmasiUniversitas($id)

    {
        $univ = Universitas::findOrFail($id);
        $univ->status = 'active';
        $univ->save();

        return redirect()->route('admin-home')->with('success', 'Universitas berhasil dikonfirmasi');
    }

    public function tolakPelamar($id)

    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->delete();

        return redirect()->route('admin-home')->with('success', 'Pelamar berhasil ditolak dan dihapus');
    }

    public function tolakUniversitas($id)

    {
        $univ = Universitas::findOrFail($id);
        $univ->delete();

        return redirect()->route('admin-home')->with('success', 'Universitas berhasil ditolak dan dihapus');
    }

}
