<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    
    protected $table = 'ulasan';


    protected $fillable = ['content', 'user_name', 'user_avatar'];
}
