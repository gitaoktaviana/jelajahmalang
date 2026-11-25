<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['user_id', 'destination_id', 'title', 'description', 'image'];

    public function user() { return $this->belongsTo(User::class); }
    public function destination() { return $this->belongsTo(Destination::class); }
}