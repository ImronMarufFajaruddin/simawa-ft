<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'gambar',
        'instansi_id',
    ];

    protected $casts = [
        'gambar' => 'array',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
}
