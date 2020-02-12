<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user()
    {
    	//Uma direção só vai pertenecer a um usuario
        // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    	return $this->belongsTo(User::class, 'user_id');
    }
}
