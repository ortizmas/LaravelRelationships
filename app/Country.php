<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts()
    {
    	//Um pais puede tener muchos post atraves del usuario
        return $this->hasManyThrough(Post::class, User::class);
    }
}
