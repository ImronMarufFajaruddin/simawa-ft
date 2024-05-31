<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'instansi_id',
        'periode',
        'nama_jabatan',
    ];
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }
}
