<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    //
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = ['nombre','descripcion','enlace','nivel','codigo','orden','estado'];

    public function opciones()
    {
    	return $this->belongsToMany(opciones::class,"opciones_roles")->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany('App\User',"usuarios_roles")->withTimestamps();
    }
}
