<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_instansi_id',
        'user_id',
        'nama_resmi',
        'nama_singkatan',
        'logo',
        'no_telp',
        'instagram',
        'website_link',
        'sejarah',
    ];
    public function kategoriInstansi()
    {
        return $this->belongsTo(KategoriInstansi::class, 'kategori_instansi_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function temporaryGalery()
    {
        return $this->hasMany(TemporaryUploadGaleriModel::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function levelJabatan()
    {
        return $this->hasMany(LevelJabatan::class);
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->nama_singkatan);
    }
}
