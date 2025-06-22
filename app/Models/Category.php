<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'icon'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'categories_id');
    }


    // public function products()
    // {
    //     return $this->hasManyThrough(Product::class, SubCategory::class, 'categories_id', 'sub_category_id');
    // }
}
