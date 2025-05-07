<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $primaryKey = 'id_sub_categories';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'categories_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
