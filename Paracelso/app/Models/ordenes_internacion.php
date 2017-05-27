<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordenes_internacion extends Model
{
    //
    protected $table = 'ordenes_internacion';
    protected $primaryKey = 'id_orden_internacion';

    protected $fillable = ['id_bitacora','codigo_institucion','id_consulta','id_persona','id_medico','tipo_internacion','lugar_internacion','fecha_internacion','estado'];

    protected $dates = ['fecha_internacion'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha_internacion'] = Carbon::parse($date);
    }

    public function institucion()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }

    public function consulta()
    {
    	return $this->belongsTo(consultas::class,'id_consulta','id_consulta');
    }

    public function persona()
    {
    	return $this->belongsTo(personas::class,'id_persona','id_persona');
    }

    public function medico()
    {
    	return $this->belongsTo(medicos::class,'id_medico','id_medico');
    }
}
