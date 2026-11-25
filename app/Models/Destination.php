<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'location', 'description', 'cover',
    ];

    public function category() { return $this->belongsTo(Category::class); }
    public function articles() { return $this->hasMany(Article::class); }
    public function galleries() { return $this->hasMany(Gallery::class); }
}