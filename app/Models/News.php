<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $fillable = ['title', 'content', 'link', 'category_id','valid_from','valid_until','published','pdf'];
	protected $casts = [
	    'valid_from' => 'datetime',
	    'valid_until' => 'datetime',
	];

    	public function category()
	{
	    return $this->belongsTo(Category::class);
	}
}
