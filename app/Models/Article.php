<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'small_text', 'content',
        'image', 'is_active', 'is_popular',
        'meta_title', 'meta_description', 'meta_keywords',
    ];
}
