<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Image extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
