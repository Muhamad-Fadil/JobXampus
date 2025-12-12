<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = 'pelamar';

    // Primary key
    protected $primaryKey = 'id_pelamar';

    // Jika primary key bukan UUID atau bukan string
    public $incrementing = true;
    protected $keyType = 'int';

    // Tanggal otomatis tidak digunakan (created_at, updated_at)
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status',
        'ringkasan_profil',
        'status_akun',
    ];

    protected $hidden = [
        'password',
    ];

    public function pengalamanKerja()

    {

        return $this->hasMany(PengalamanKerja::class, 'id_pelamar', 'id_pelamar');

    }

    public function pendidikan()

    {

        return $this->hasMany(Pendidikan::class, 'id_pelamar', 'id_pelamar');
        
    }

}
