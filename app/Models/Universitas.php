<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lowongan;

class Universitas extends Model
{
    protected $table = 'universitas';
    protected $primaryKey = 'id_universitas';
    public $timestamps = false;

    protected $fillable = [
        'nama_universitas',
        'email',
        'password',
        'alamat',
        'deskripsi',
        'alamat_website',
        'logo',
        'kota',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function lowongan()

    {

        return $this->hasMany(Lowongan::class, 'id_universitas');
        
    }
}
