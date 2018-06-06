<?php

use App\User;
use App\Post;
use App\Role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// get one user post - One to One relationship 
Route::get('/user/post/{id}', function($id)
{
    $title =  User::find($id)->post->title;
    $content =  User::find($id)->post->content;
    return $title.$content;
});


// Get the name who owns a post - Inverse relation ship
Route::get('/post/{id}/user', function($id)
{
    return Post::find($id)->user->name;
    // searched the post, and the took out user name
});

// Ģet all user posts - One to Many relationship
Route::get('/posts', function()
{
    $user = User::find(1);

    foreach($user->posts as $post)
    {
        echo "ID: " . $post->id . "<br>";
        echo "Title: " . $post->title . "<br>";
        echo "Content: " . $post->content . "<br>";
    }
});

// get users role - Many to Many relationship
Route::get('/user/{id}/role', function($id)
{
    $user = User::find($id)->roles()->get();
    return $user;

    // $user = User::find($id);  
  
    // foreach($user->roles as $role)
    // {
    //     return $role->name;
    // }

});

// Accessing intermediate table / pivot

Route::get('/user/pivot', function()
{
    $user = User::find(1);

    foreach($user->roles as $role)
    {
        echo $role->pivot->created_at;
    }
});