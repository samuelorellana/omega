<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicos extends Model
{
    //
    protected $table = 'medicos';
    protected $primaryKey = 'id_medico';

    protected $fillable = ['id_bitacora','id_persona','codigo_institucion','codigo_especialidad','matricula_min_salud','matricula_col_medico','ranking','alma_mater','estado'];

    public function personas()
    {
    	return $this->belongsTo(personas::class,'id_persona','id_persona');
    }

    public function citas()
    {
    	return $this->hasMany(citas::class,'id_medico','id_medico');
    }

    public function instituciones()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }

    public function scopeLocales($query)
    {
        $query->where('codigo_institucion',Auth()->user()->codigo_institucion);
    }

    public function historia()
    {
        return $this->hasMany(historia_clinica::class,'id_medico','id_medico');
    }

    public function consultas()
    {
        return $this->hasMany(consultas::class,'id_medico','id_medico');
    }

    public function orden_internacion()
    {
        return $this->hasMany(ordenes_internacion::class,'id_medico','id_medico');
    }
}
