<?php

// app/Models/Carousel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'carousel';
    protected $primaryKey = 'id_carousel';

    protected $fillable = ['judul', 'gambar', 'link', 'status'];
}
