<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class evoluciones extends Model
{
    //
    protected $table = 'evoluciones';
    protected $primaryKey = 'id_evolucion';
    public $timestamps = false;

    protected $fillable = ['id_internacion','id_bitacora','id_medico','tipo_evolucion','subjetivo','objetivo','glasgow','frecuencia_cardiaca','frecuencia_respiratoria','presion_sistolica','presion_diastolica','peso','talla','temperatura','plan','tipo_conducta','fecha_hora','estado'];

    protected $dates = ['fecha_hora'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha_hora'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
    }

    public function medico()
    {
    	return $this->belongsTo(medicos::class,'id_medico','id_medico');
    }

    public function internacion()
    {
    	return $this->belongsTo(personas::class,'id_internacion','id_internacion');
    }
}
