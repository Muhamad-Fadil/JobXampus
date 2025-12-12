<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelamar;

class PengalamanKerja extends Model
{
    // Jika nama tabel tidak mengikuti konvensi Laravel (jamak)
    protected $table = 'pengalaman_kerja';

    // Primary key
    protected $primaryKey = 'id_pengalaman';

    // Jika primary key bukan UUID atau bukan string
    public $incrementing = true;
    protected $keyType = 'int';

    // Tanggal otomatis tidak digunakan (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'id_pelamar',
        'nama_instansi',
        'posisi',
        'tahun_mulai',
        'tahun_selesai',
        'deskripsi'
    ];

    public function pelamar()

    {

        return $this->belongsTo(Pelamar::class, 'id_pelamar');
        
    }
}
