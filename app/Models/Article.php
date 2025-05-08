<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'id_articles';

    protected $fillable = [
        'judul',
        'konten_artikel',
        'gambar',
        'tanggal_publish',
    ];
}

