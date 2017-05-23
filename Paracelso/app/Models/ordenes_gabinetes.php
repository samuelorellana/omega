<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ordenes_gabinetes extends Model
{
    //
    protected $table = 'ordenes_gabinetes';
    protected $primaryKey = 'id_orden_gabinete';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_consulta','tipo_gabinete','orden','complemento','urgente','fecha_hora','estado'];

    protected $dates = ['fecha_hora'];

    public function setFechaHoraAttribute($date)
    {
    	$this->attributes['fecha_hora'] = Carbon::parse($date);
    }

    public function consulta()
    {
        return $this->belongsTo(consultas::class,'id_consulta','id_consulta');
    }
}
