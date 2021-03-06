<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title','content','author_id'
	];

    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function getContentAttribute($value)
    {
        return str_limit($value, 50);
    }

    public function user()
    {
        //Um post solo pode pertenecer a um usuario
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        //El segunto parametro leva o nome definido da function no modelo comment
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        //El segunto parametro leva o nome definido da function no modelo comment
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /*public function comments()
    {
        return $this->hasMany('App\Comment');
    }*/

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function scopeByAuthorId($query, $authorId)
    {
        return $query->with(['user', 'author'])->where('author_id', $authorId);
    }
}
