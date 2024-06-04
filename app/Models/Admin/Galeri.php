<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryLey = 'id';

    // protected $fillable = [
    //     'instansi_id',
    //     'gambar',
    // ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
