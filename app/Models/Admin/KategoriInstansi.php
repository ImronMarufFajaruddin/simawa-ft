<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInstansi extends Model
{
    use HasFactory;

    protected $table = 'kategori_instansi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kategori_nama',
    ];

    public function instansi()
    {
        return $this->hasMany(Instansi::class, 'kategori_instansi_id', 'id');
    }
}
