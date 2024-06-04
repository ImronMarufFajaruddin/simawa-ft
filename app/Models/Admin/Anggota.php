<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'instansi_id',
    //     'level_jabatan_id',
    //     'nama',
    //     'nim',
    //     'foto',
    // ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function levelJabatan()
    {
        return $this->belongsTo(LevelJabatan::class);
    }
}
