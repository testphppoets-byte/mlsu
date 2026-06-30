<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'site_name',
        'title',
        'logo',
        'height',
        'width',
        'head_content',
        'footer_content',
    ];
}
