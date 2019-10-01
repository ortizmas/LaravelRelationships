<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'author_email','content'
	];

	//Mi modelo de comentario pode receber coments tanto de post, video e users
	public function commentable()
	{
		return $this->morphTo();
	}

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
