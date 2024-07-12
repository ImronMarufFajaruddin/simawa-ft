<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'landing_page_footer';
    protected $fillable = [
        'alamat',
        'telp',
        'email',
        'medsos_links',
        'useful_links',
        'useful_links_title',
    ];
}
