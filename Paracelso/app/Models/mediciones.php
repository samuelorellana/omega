<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mediciones extends Model
{
    //
    protected $table = 'mediciones';
    protected $primaryKey = 'id_medicion';

    protected $fillable = ['id_bitacora','id_persona','glasgow','frecuencia_cardiaca','frecuencia_respiratoria','presion_sistolica','presion_diastolica','peso','talla','temperatura','spo2','dolor','notas','estado'];

    public function persona()
    {
    	return $this->belongsTo(personas::class,'id_persona','id_persona');
    }
}
