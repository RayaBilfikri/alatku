<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteProfile extends Model
{
    protected $table = 'website_profile';

    protected $fillable = [
        'nama_website',
        'logo_website',
        'tentang_kami',
    ];
}
