<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Instansi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'kegiatan_id', 'id');
    }

    public function lpj()
    {
        return $this->hasOne(Lpj::class, 'kegiatan_id', 'id');
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'user_id', 'user_id');
    }
}
