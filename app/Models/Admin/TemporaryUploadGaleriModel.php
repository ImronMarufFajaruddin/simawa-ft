<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryUploadGaleriModel extends Model
{
    use HasFactory;


    protected $table = 'temporary_uploads';
    protected $fillable = [
        'instansi_id',
        'file_name',
        'file_path',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
}
