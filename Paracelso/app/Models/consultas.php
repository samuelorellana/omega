<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class consultas extends Model
{
    //
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';

    protected $fillable = ['id_bitacora','id_persona','id_consultorio','id_medico','id_receptor','id_cita','codigo_institucion','tipo_consulta','motivo_consulta','historia','fecha','estado','hora'];

    protected $dates = ['fecha'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha'] = Carbon::parse($date);
    }

    public function setHoraAttribute($time)
    {
        $this->attributes['hora'] = Carbon::parse($time);
    }

    public function medico()
    {
    	return $this->belongsTo(medicos::class,'id_medico','id_medico');
    }

    public function persona()
    {
    	return $this->belongsTo(personas::class,'id_persona','id_persona');
    }

    public function instituciones()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }

    public function revision()
    {
        return $this->hasOne(revisiones_consultas::class,'id_consulta','id_consulta');
    }

    public function evaluacion()
    {
        return $this->hasOne(evaluaciones_consultas::class,'id_consulta','id_consulta');
    }

    public function tratamientos()
    {
        return $this->hasMany(tratamientos_consultas::class,'id_consulta','id_consulta');
    }

    public function ordenesL()
    {
        return $this->hasMany(ordenes_laboratorios::class,'id_consulta','id_consulta');
    }

    public function ordenesG()
    {
        return $this->hasMany(ordenes_gabinetes::class,'id_consulta','id_consulta');
    }

    public function orden_internacion()
    {
        return $this->hasOne(ordenes_internacion::class,'id_consulta','id_consulta');
    }
}
