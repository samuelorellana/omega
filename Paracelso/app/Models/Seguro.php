<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    //
    protected $table = 'pa_seguros';
    protected $primaryKey = 'id_seguro';
    public $timestamps = false;
    protected $fillable = ['tipo_seguro','nombre','estado'];

    public function setTipoSeguroAttribute($value)
    {
    	$this->attributes['tipo_seguro'] = strtoupper($value);
    }

    public function setNombreAttribute($value)
    {
    	$this->attributes['nombre'] = strtoupper($value);
    }
}
