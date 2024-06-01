<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HashUuid;

class Berita extends Model
{
    use HasFactory, HashUuid;

    protected $table = 'berita';
    protected $primaryKey = 'id';

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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id');
    }
}
