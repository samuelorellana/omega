<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class tratamientos_consultas extends Model
{
    //
    protected $table = 'tratamientos_consultas';
    protected $primaryKey = 'id_tratamiento_consulta';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_consulta','tipo_tratamiento','prescripcion','codigo_medicamento','fecha_hora','estado'];

    protected $dates = ['fecha_hora'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha_hora'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
    }

    public function consulta()
    {
        return $this->belongsTo(consultas::class,'id_consulta','id_consulta');
    }
}
