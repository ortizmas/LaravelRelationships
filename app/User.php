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
        //hasOne('Class: Address::class',  'foreanKey: user_id', 'localKey: id')
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    public function posts()
    {
        //Um usuario pode ter muitos post
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        // return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        //'Modelo a relacionar', 'nome_tablea_pivot', 'llave foranea del modelo que raliza la relacion', 'llave foranea del modelo a relacionar'.
        //'Role::class', 'asignar_rol', 'user_id', 'role_id'    
        return $this->belongsToMany(Role::class)->withTimestamps(); //convension laravel nao precisso os outros parametros
    }
}
