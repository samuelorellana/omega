<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class diagnosticos_consultas extends Model
{
    //
    protected $table = 'diagnosticos_consultas';
    protected $primaryKey='id_diagnostico_consulta';
    public $timestamps = false;
    protected $fillable = ['id_evaluacion_consulta','id_bitacora','tipo_diagnostico','codigo_cie','descripcion','estado'];

    public function evaluacion()
    {
    	return $this->belongsTo(evaluaciones_consultas::class,'id_evaluacion_consulta','id_evaluacion_consulta');
    }
}
