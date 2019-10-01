<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $fillable = [
		'name','description'
	];

    public function comments()
    {
        //El segunto parametro leva o nome definido da function no modelo comment
        return $this->morphMany(Comment::class, 'commentable');
    }
}
