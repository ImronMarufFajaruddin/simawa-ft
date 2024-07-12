<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Kegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lpj extends Model
{
    use HasFactory;

    protected $table = 'lpj';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'user_id',
    //     'kegiatan_id',
    //     'dokumen',
    //     'status',
    //     'komentar',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
