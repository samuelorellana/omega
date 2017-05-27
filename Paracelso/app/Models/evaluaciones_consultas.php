<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evaluaciones_consultas extends Model
{
    //
    protected $table = 'evaluaciones_consultas';
    protected $primaryKey = 'id_evaluacion_consulta';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_consulta','laboratorio','gabinete','estado','tipo_conducta'];

    public function consulta()
    {
    	return $this->belongsTo(consultas::class,'id_consulta','id_consulta');
    }

    public function diagnosticos()
    {
    	return $this->hasMany(diagnosticos_consultas::class,'id_evaluacion_consulta','id_evaluacion_consulta');
    }
}
