<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    //
    protected $table = 'pa_dominios';
    protected $primaryKey = 'id_dominio';
    public $timestamps = false;
    protected $fillable = ['nombre','codigo_dominio','descripcion','estado'];

    public function setNombreAttribute($value)
    {
    	$this->attributes['nombre'] = strtoupper($value);
    }

    public function setCodigoDominioAttribute($value)
    {
    	$this->attributes['codigo_dominio'] = strtoupper($value);
    }

    public function setDescripcionAttribute($value)
    {
    	$this->attributes['descripcion'] = strtoupper($value);
    }

    //prueba de query scopes

    public function scopeNombre($query,$nombre)
    {
        $query->where('nombre',$nombre)->orderBy('id_dominio','asc');
    }

    public function scopeCodigo($query,$codigo)
    {
        $query->where('codigo_dominio',$codigo)->get();
    }
}
