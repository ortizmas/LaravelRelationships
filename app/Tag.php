<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
 	   
    public function posts()
    {
    	//https://www.youtube.com/watch?v=KBz2kqeec2Q
    	//Parametros 'Post::calss', 'taggable', 'taggables', 'tag_id', 'id', passar esses parametros se nao usamos a convesion de laravel
    	return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos()
    {
    	//https://www.youtube.com/watch?v=KBz2kqeec2Q
    	//Parametros 'Post::calss', 'taggable', 'taggables', 'tag_id', 'id', passar esses parametros se nao usamos a convesion de laravel
    	return $this->morphedByMany(Video::class, 'taggable');
    }
}
