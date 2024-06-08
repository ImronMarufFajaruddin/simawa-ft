<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Traits\HashUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

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
