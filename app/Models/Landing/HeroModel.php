<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroModel extends Model
{
    use HasFactory;

    protected $table = 'landing_page_hero';
    protected $fillable = [
        'id',
        'title',
        'hero_deskripsi',
        'logo',
        'about_title',
        'about',
        'about_foto',
    ];
}
