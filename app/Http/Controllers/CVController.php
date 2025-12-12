<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Pelamar;
use App\Models\PengalamanKerja;
use App\Models\Pendidikan;


class CVController extends Controller
{
    public function previewCV()

    {

        $id = Session::get('pelamar_id');
        $pelamar = Pelamar::with(['pengalamanKerja', 'pendidikan'])->findOrFail($id);

        return view('cv.preview', [
            'pelamar' => $pelamar,
            // Kalau kamu masih pakai $pengalamanKerja di blade, bisa ditambahkan juga:
            'pengalamanKerja' => $pelamar->pengalamanKerja,
            'pendidikan' => $pelamar->pendidikan,
        ]);

    }

    public function download()

    {

        $pelamar_id = session('pelamar_id');
        $pelamar = Pelamar::with(['pengalamanKerja', 'pendidikan'])->findOrFail($pelamar_id);

        $pengalamanKerja = $pelamar->pengalamanKerja;
        $pendidikan = $pelamar->pendidikan;

        // Simpan ke folder public/cv langsung
        $filename = 'CV-' . $pelamar->nama . '.pdf';
        $path = public_path('cv/' . $filename);

        // Pastikan folder public/cv ada
        if (!file_exists(public_path('cv'))) {
            mkdir(public_path('cv'), 0755, true);
        }

        // Simpan PDF ke public/cv
        $pdf = PDF::loadView('cv.preview', compact('pelamar', 'pengalamanKerja', 'pendidikan'));
        $pdf->save($path);

        // Simpan nama file di DB (jika pakai kolom cv_file)
        $pelamar->cv_file = 'cv/' . $filename;
        $pelamar->save();

        // Download file-nya
        return response()->download($path);
        
    }

    public function upload(Request $request)

    {

        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $pelamar = Pelamar::findOrFail(session('pelamar_id'));

        // Hapus file lama jika ada
        if ($pelamar->cv_file && file_exists(public_path($pelamar->cv_file))) {
            unlink(public_path($pelamar->cv_file));
        }

        // Simpan file baru
        $originalName = $request->file('cv_file')->getClientOriginalName();
        $filename = $originalName;
        $request->file('cv_file')->move(public_path('cv'), $filename);

        // Simpan path ke DB
        $pelamar->cv_file = 'cv/' . $filename;
        $pelamar->save();

        return redirect()->back()->with('success-cv', 'CV berhasil diunggah.');

    }

    public function delete()

    {

        $pelamar = Pelamar::findOrFail(session('pelamar_id'));

        if ($pelamar->cv_file && file_exists(public_path($pelamar->cv_file))) {
            unlink(public_path($pelamar->cv_file));
            $pelamar->cv_file = null;
            $pelamar->save();
        }

        return redirect()->back()->with('success-cv', 'CV berhasil dihapus.');
        
    }

}
