<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelJabatan extends Model
{
    use HasFactory;

    protected $table = 'level_jabatan';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'instansi_id',
    //     'periode',
    //     'nama_jabatan',
    // ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
