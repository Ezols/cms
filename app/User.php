<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // get one user post by user_id - One to One relationship 
    public function post() {
        // By default its going to find user_id in Post table
        return $this->hasOne('App\Post');
        // return $this->hasOne('App\Post', 'different_user_id_collumn');
    }

    // One to Many relationship
    public function posts(){

        return $this->hasMany('App\Post');
    }
}
