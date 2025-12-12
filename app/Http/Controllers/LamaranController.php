<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AuthController;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\Lowongan;

class LamaranController extends Controller
{

    public function melamar(Request $request, $id_lowongan)

    {

        $pelamarId = session('pelamar_id');
        
        
        $cek = Lamaran::where('id_pelamar', $pelamarId)
                    ->where('id_lowongan', $id_lowongan)
                    ->first();
        
        if ($cek) {
            return back()->with('error', 'Sudah melamar');
        }
        
        $lamaran = new Lamaran();
        $lamaran->id_pelamar = $pelamarId;
        $lamaran->id_lowongan = $id_lowongan;
        $lamaran->status = 'Menunggu';
        $lamaran->save();
        
        return back()->with('success', 'Lamaran berhasil dikirim');

    }
 
}
