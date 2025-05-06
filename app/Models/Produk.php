<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Contact;

class Product extends Model
{
    protected $primaryKey = 'id_products';

    protected $fillable = [
        'sub_categories_id',
        'contacts_id',
        'name',
        'serial_number',
        'year_of_build',
        'hours_meter',
        'stock',
        'harga',
        'deskripsi',
        'brosur',
    ];

    public function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id');
    }

    public function contact() {
        return $this->belongsTo(Contact::class, 'contacts_id');
    }
}
