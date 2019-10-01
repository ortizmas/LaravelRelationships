<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user()
    {
    	//Uma direção só vai pertenecer a um usuario
    	return $this->belongsTo(User::class);
    }
}
