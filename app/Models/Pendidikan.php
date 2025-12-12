<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelamar;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';

    // Primary key
    protected $primaryKey = 'id_pendidikan';

    // Jika primary key bukan UUID atau bukan string
    public $incrementing = true;
    protected $keyType = 'int';

    // Tanggal otomatis tidak digunakan (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'id_pelamar',
        'nama_institusi',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
    ];

    public function pelamar()

    {

        return $this->belongsTo(Pelamar::class, 'id_pelamar');
        
    }
}
