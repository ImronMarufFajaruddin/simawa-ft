<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_resmi',
        'nama_singkatan',
        'logo',
        'no_telp',
        'instagram',
        'sejarah'
    ];
    public function kategoriOrmawa()
    {
        $this->belongsTo(KategoriOrmawa::class, 'kategori_ormawa_id');
    }
}
