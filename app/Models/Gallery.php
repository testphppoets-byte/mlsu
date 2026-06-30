<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class);
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
}
