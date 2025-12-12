<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Universitas;

class Lowongan extends Model
{
   // Jika nama tabel tidak mengikuti konvensi Laravel (jamak)
    protected $table = 'lowongan';

    // Primary key
    protected $primaryKey = 'id_lowongan';

    // Jika primary key bukan UUID atau bukan string
    public $incrementing = true;
    protected $keyType = 'int';

    // Tanggal otomatis tidak digunakan (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'nama_lowongan',
        'deskripsi',
        'jabatan',
        'waktu_kerja',
        'kualifikasi',
        'gaji',
        'id_universitas',
        'kategori',
    ];

    // Relasi: Lowongan milik satu Universitas
    public function universitas() 

    {

        return $this->belongsTo(Universitas::class, 'id_universitas');

    }

    public function lamaran() 

    {

        return $this->hasMany(Lamaran::class, 'id_lowongan');
        
    }
    
}
