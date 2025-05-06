<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['nama_subkategori']; // sesuaikan dengan field-nya

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_categories_id');
    }
}
