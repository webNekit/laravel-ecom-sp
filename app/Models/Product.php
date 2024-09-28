<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description',
        'img', 'price', 'sale',
        'category_id', 'specifics', 'images',
        'is_active', 'is_popular'
    ];

    protected $casts = [
        'specifics' => 'array',
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
