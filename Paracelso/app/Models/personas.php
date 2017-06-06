<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class personas extends Model
{
    //
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';

    protected $fillable = ['id_bitacora','codigo_institucion','nombre','ap_paterno','ap_materno','fecha_nacimiento','documento_identidad','tipo_documento','sexo','email','no_telefono','no_celular','no_telefono_trabajo','direccion','ciudad_residencia','lugar_nacimiento','estado','religion','observaciones'];

    protected $dates = ['fecha_nacimiento'];

    public function setFechaNacimientoAttribute($date)
    {
    	$this->attributes['fecha_nacimiento'] = Carbon::parse($date);
    }

    public function users()
    {
        return $this->belongstoMany('App\User',"usuarios_personas")->withTimestamps();
    }

    public function institucion()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }

    public function medicos()
    {
        return $this->hasOne(medicos::class,'id_persona','id_persona');
    }

    public function citas()
    {
        return $this->hasMany(citas::class,'id_persona','id_persona');
    }

    public function historia()
    {
        return $this->hasOne(historia_clinica::class,'id_persona','id_persona');
    }

    public function consultas()
    {
        return $this->hasMany(consultas::class,'id_persona','id_persona');
    }

    public function medicion()
    {
        return $this->hasMany(mediciones::class,'id_persona','id_persona');
    }

    public function imagen()
    {
        return $this->hasOne(personas_imagenes::class,'id_persona','id_persona');
    }

    public function orden_internacion()
    {
        return $this->hasMany(ordenes_internacion::class,'id_persona','id_persona');
    }

    public function internacion()
    {
        return $this->hasMany(internaciones::class,'id_persona','id_persona');
    }
}
