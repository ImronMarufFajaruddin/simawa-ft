<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'proposal_id', 'id');
    }

    public function lpj()
    {
        return $this->hasMany(Lpj::class, 'lpj_id', 'id');
    }
}
