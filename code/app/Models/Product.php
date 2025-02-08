<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'main_image_id'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function mainImage()
    {
        return $this->belongsTo(Image::class, 'main_image_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
