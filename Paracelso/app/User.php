<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\instituciones;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','codigo_institucion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongstoMany('App\Models\roles',"usuarios_roles")->withTimestamps();
    }

    public function personas()
    {
        return $this->belongstoMany('App\Models\personas',"usuarios_personas")->withTimestamps();
    }

    public function institucion()
    {
        return $this->belongsTo('App\Models\instituciones','codigo_institucion','codigo_institucion');
    }

    public function bitacoras()
    {
        return $this->hasMany(Bitacora::class,'id_usuario','id');
    }
}
