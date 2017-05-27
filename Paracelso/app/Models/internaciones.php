<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class internaciones extends Model
{
    //
    protected $table = 'internaciones';
    protected $primaryKey = 'id_internacion';
    public $timestamps = false;

    protected $fillable = ['id_orden_internacion','id_bitacora','id_persona','id_medico','codigo_institucion','tipo_internacion','fecha_hora','estado'];

    protected $dates = ['fecha_hora'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha_hora'] = Carbon::createFromFormat('Y-m-d H:i:s',$date);
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
}
