<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInstansi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_nama',
    ];

    public function instansi()
    {
        return $this->hasMany(Instansi::class);
    }
}
