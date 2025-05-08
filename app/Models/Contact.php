<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'no_wa',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
