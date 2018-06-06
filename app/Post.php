<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates= ['deleted_at'];
    protected $fillable = ['title', 'content'];


    // Get the name who owns a post - Inverse relation ship
    public function user() {
        return $this->belongsTo('App\User');
    }
}
