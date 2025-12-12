<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\Universitas;
use App\Http\Controllers\UniversitasController;

class Lamaran extends Model
{
    protected $table = 'lamaran';
    protected $primaryKey = 'id_lamaran';
    public $timestamps = false;

    protected $fillable = [
    'id_pelamar',
    'id_lowongan',
    'status',
    'dibaca',
    ];


    public function pelamar() 

    {

        return $this->belongsTo(Pelamar::class, 'id_pelamar');

    }

    public function lowongan() 
    
    {

        return $this->belongsTo(Lowongan::class, 'id_lowongan');

    }
}


