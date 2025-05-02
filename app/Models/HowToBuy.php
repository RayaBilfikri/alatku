<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowToBuy extends Model
{
    use HasFactory;

    protected $table = 'how_to_buys';
    protected $fillable = [
        'judul',
        'gambar',
        'link',
        'status',
    ];
}
