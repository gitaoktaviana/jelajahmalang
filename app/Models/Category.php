<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function destinations() { return $this->hasMany(Destination::class); }
    public function articles() { return $this->hasMany(Article::class); }
}