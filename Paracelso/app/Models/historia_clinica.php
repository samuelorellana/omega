<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historia_clinica extends Model
{
    //
    protected $table = 'historias_clinicas';
    protected $primaryKey = 'id_historia';

    protected $fillable = ['id_bitacora','id_persona','id_medico','codigo_institucion','nota','grupo_sanguineo','estado'];

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

    public function alergias()
    {
        return $this->hasMany(alergias::class,'id_historia','id_historia');
    }

    public function diagnosticos_historia()
    {
        return $this->hasMany(diagnosticos_historia::class,'id_historia','id_historia');
    }

    public function tratamientos_historia()
    {
        return $this->hasMany(tratamientos_historia::class,'id_historia','id_historia');
    }

    public function antecedentes_historia()
    {
        return $this->hasMany(antecedentes_historia::class,'id_historia','id_historia');
    }

    public function anamnesis_historia()
    {
        return $this->hasMany(anamnesis_historia::class,'id_historia','id_historia');
    } 
}
