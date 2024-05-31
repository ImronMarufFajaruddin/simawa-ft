<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_berita_id',
        'judul',
        'slug',
        'konten',
        'gambar',
        'dokumen',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }
}
