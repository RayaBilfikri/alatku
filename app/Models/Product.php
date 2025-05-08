<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [

        'sub_category_id',
        'contact_id',
        'name',
        'gambar',
        'serial_number',
        'year_of_build',
        'hours_meter',
        'stock',
        'harga',
        'description',
        'brosur',
    ];
    

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
