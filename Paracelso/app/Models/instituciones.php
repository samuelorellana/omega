<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instituciones extends Model
{
    //
    protected $table = 'pa_instituciones';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo_institucion','tipo_institucion','nombre_institucion','descripcion','direccion','estado'];

    public function personas()
    {
    	return $this->hasMany(personas::class,'codigo_institucion','codigo_institucion');
    }

    public function users()
    {
    	return $this->hasMany('App\User','codigo_institucion','codigo_institucion');
    }

    public function medicos()
    {
        return $this->hasMany(medicos::class,'codigo_institucion','codigo_institucion');
    }

    public function citas()
    {
        return $this->hasMany(citas::class,'codigo_institucion','codigo_institucion');
    }

    public function bitacoras()
    {
        return $this->hasMany(Bitacora::class,'codigo_institucion','codigo_institucion');
    }

    public function historia()
    {
        return $this->hasMany(historia_clinica::class,'codigo_institucion','codigo_institucion');
    }

    public function consultas()
    {
        return $this->hasMany(consultas::class,'codigo_institucion','codigo_institucion');
    }

    public function orden_internacion()
    {
        return $this->hasMany(ordenes_internacion::class,'codigo_institucion','codigo_institucion');
    }
}
