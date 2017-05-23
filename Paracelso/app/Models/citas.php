<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class citas extends Model
{
    //
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';

    protected $fillable = ['id_bitacora','id_persona','id_medico','id_consultorio','codigo_institucion','motivo','historia','fecha','hora','estado'];

    protected $dates = ['fecha'];

    public function setFechaAttribute($date)
    {
    	$this->attributes['fecha'] = Carbon::parse($date);
    }

    public function setHoraAttribute($time)
    {
    	$this->attributes['hora'] = Carbon::parse($time);
    }

    public function personas()
    {
    	return $this->belongsTo(personas::class,'id_persona','id_persona');
    }

    public function medicos()
    {
    	return $this->belongsTo(medicos::class,'id_medico','id_medico');
    }

    public function instituciones()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }
}
