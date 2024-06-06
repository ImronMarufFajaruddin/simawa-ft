<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'kategori_nama',
    // ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
    }
}
