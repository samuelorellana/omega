<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class sitios_internaciones extends Model
{
    //
    protected $table = 'sitio_internaciones';
    protected $primaryKey = 'id_sitio_internacion';
    public $timestamps = false;

    protected $fillable = ['id_internacion','id_bitacora','id_medico','tipo_unidad','piso','cama','notas','fecha_hora','estado'];

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
    	return $this->belongsTo(internaciones::class,'id_internacion','id_internacion');
    }
}
