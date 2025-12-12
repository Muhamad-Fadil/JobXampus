<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    // Tanggal otomatis tidak digunakan (created_at, updated_at)
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function universitas()

    {

        return $this->belongsTo(Universitas::class, 'id_universitas');

    }

    public function pelamar()

    {

        return $this->belongsTo(Pelamar::class, 'id_pelamar');
        
    }
}
