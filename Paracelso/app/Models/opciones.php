<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class opciones extends Model
{
    //
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    protected $fillable = ['descripcion','url','nsec_opcion','prioridad','estado'];

    public function roles()
    {
    	return $this->belongsToMany(roles::class,"opciones_roles")->withTimestamps();
    }
}
