<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        /* $this->comments()->create(compact('body')); */
         Comment::create([
             'body' => request('body') ,
             'name' => request('name'),
             'email' => request('email'),
             'post_id' => $this->id
         ]);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
