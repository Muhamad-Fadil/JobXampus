<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LamaranController;
use App\Models\Pelamar;
use App\Models\Universitas;
use App\Models\Admin;
use App\Models\Lamaran;


class AuthController extends Controller
{

    // ===================== Fungsi Login Register dan Notifikasi Pelamar Start ========================
    
    public function showLogin()
    
    {
        
        return view('login');
        
    }
    
    public function login(Request $request)
    
    {
        
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
            
        ]);
        
        $username = $request->nama;
        $password = $request->password;
        
        // Cek dulu di tabel admin
        $admin = DB::table('admin')->where('username', $username)->first();
        
        if ($admin && $admin->password === $password) { // Ganti dengan Hash::check jika sudah pakai bcrypt
            Session::put('admin', $admin->username);
            return redirect('/admin-home'); // Atur ke halaman dashboard admin
        }
        
        // Kalau bukan admin, cek di tabel pelamar
        $pelamar = Pelamar::where('nama', $username)->first();
        
        if ($pelamar && Hash::check($password, $pelamar->password)) {
            
            if ($pelamar->status_akun !== 'active') {
                return back()->withErrors(['login' => 'Akun Anda belum dikonfirmasi oleh admin.']);
            }
            
            Session::put('pelamar_id', $pelamar->id_pelamar);
            Session::put('pelamar', $pelamar->nama);
            
            $this->refreshNotifikasi();
            
            return redirect('/home-pelamar')->with('success-login', 'Berhasil Login Akun Pelamar.');
        }
        
        // Gagal login
        return back()->withErrors(['login' => 'Username atau Password salah']);
    }
    
    
    public function refreshNotifikasi()
    
    {
        
        $pelamarId = session('pelamar_id');
        
        $notifikasi = Lamaran::with('lowongan')
        ->where('id_pelamar', $pelamarId)
        ->where('status', '!=', 'Menunggu')
        ->where(function ($q) {
            $q->where('dibaca', 0)->orWhereNull('dibaca');
        })
        ->latest()
        ->take(5)
        ->get();
        
        session(['notifikasi_lamaran' => $notifikasi]);
        
    }
    
    public function hapusNotifikasi($id)
    
    {
        
        $pelamarId = session('pelamar_id');
        
        // Update kolom 'dibaca' menjadi 1
        Lamaran::where('id_lamaran', $id)
        ->where('id_pelamar', $pelamarId)
        ->update(['dibaca' => 1]);
        
        // Refresh session notifikasi
        $this->refreshNotifikasi();
        
        return back();
        
    }
    
    
    public function showRegisterFormPelamar()
    
    {
        return view('pelamar.register-pelamar');
        
    }
    
    public function registerPelamar(Request $request)
    
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:universitas,email',
            'password' => 'required|min:6',
        ]);
        
        try {
            // Simpan data universitas
            Pelamar::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password
                'alamat' => '',
                'tanggal_lahir' => '',
                'jenis_kelamin' => '',
                'agama' => '',
                'profile_pic' => null,
                'status' => '',
                'ringkasan_profil' => '',
                'status_akun' => 'pending'  
            ]);
            
            return redirect('/login')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan
            return back()->withErrors(['registerPelamar' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()]);
        }
        
    }
    
    // ===================== Fungsi Login Register dan Notifikasi Pelamar End ========================
    
    
    // ===================== Fungsi Login Register dan Notifikasi Universitas Start ========================
    
    public function showLoginUniversitas()

    {

        return view('universitas.login-universitas');

    }

    public function loginUniversitas(Request $request)

    {

        $request->validate([
            'nama_universitas' => 'required',
            'password' => 'required',
        ]);
        
        $username = $request->nama_universitas;
        $password = $request->password;
        
        // Cek dulu di tabel admin
        $admin = DB::table('admin')->where('username', $username)->first();
        
        if ($admin && $admin->password === $password) {
            Session::put('admin', $admin->username);
            return redirect('/admin-home');
        }
        
        // Gunakan model Universitas agar lebih rapi
        $universitas = Universitas::where('nama_universitas', $username)->first();

        // === Tambahan: akun tidak ditemukan ===
        if (!$universitas) {
            return back()->withErrors(['login-universitas' => 'Akun Anda tidak ditemukan.']);
        }

        if ($universitas && Hash::check($password, $universitas->password)) {
            if ($universitas->status !== 'active') {
                return back()->withErrors(['login-universitas' => 'Akun Anda belum dikonfirmasi oleh admin.']);
            }

            Session::put('universitas_id', $universitas->id_universitas);
            Session::put('universitas', $universitas->nama_universitas);
            return redirect('/home-universitas')->with('success-login', 'Berhasil Login Akun Universitas.');
        } else {
            return back()->withErrors(['login-universitas' => 'Username dan Passwrord salah.']);
        }
    }
    
    // Register Universitas
    
    public function showRegisterForm()

    {

        return view('universitas.register-universitas');

    }
    
    public function register(Request $request)

    {

        // Validasi input
        $request->validate([
            'nama_universitas' => 'required',
            'email' => 'required|email|unique:universitas,email',
            'password' => 'required|min:6',
        ], [
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',
        ]);

        try {
            // Simpan data universitas
            Universitas::create([
                'nama_universitas' => $request->nama_universitas,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password
                'alamat' => '',
                'deskripsi' => '',
                'alamat_website' => '',
                'kota' => '',
                'logo' => null,
                'status' => 'pending' 
            ]);
            
            return redirect('/login-universitas')->with('success', 'Registrasi berhasil!');
        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan
            return back()->withErrors(['register' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()]);
        }

    }
    
    // ===================== Fungsi Login Register dan Notifikasi Universitas Start ========================

}
