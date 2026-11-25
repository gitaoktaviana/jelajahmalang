<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'destination_id',
        'title', 'slug', 'content', 'thumbnail', 'views',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
    public function destination() { return $this->belongsTo(Destination::class); }
}