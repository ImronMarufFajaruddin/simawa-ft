<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_instansi_id',
        'nama_resmi',
        'nama_singkatan',
        'logo',
        'no_telp',
        'instagram',
        'sejarah',
    ];

    public function kategoriInstansi()
    {
        return $this->belongsTo(KategoriInstansi::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function levelJabatan()
    {
        return $this->hasMany(LevelJabatan::class);
    }
}
