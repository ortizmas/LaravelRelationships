<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        //Solo va tener uma direção
        return $this->hasOne(Address::class);
    }

    public function posts()
    {
        //Um usuario pode ter muitos post
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        //'Modelo a relacionar', 'nome_tablea_pivot', 'llave foranea del modelo que raliza la relacion', 'llave foranea del modelo a relacionar'.
        //'Role::class', 'asignar_rol', 'user_id', 'role_id'    
        return $this->belongsToMany(Role::class); //convension laravel nao precisso os outros parametros
    }
}
