<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'kategori_nama',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
    }
}
