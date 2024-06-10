<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'nama_kegiatan',
    //     'tanggal_mulai',
    //     'tanggal_selesai',
    // ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'proposal_id', 'id');
    }

    public function lpj()
    {
        return $this->hasMany(Lpj::class, 'lpj_id', 'id');
    }
}
