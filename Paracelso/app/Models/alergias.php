<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alergias extends Model
{
    //
    protected $table = 'alergias';
    protected $primaryKey='id_alergia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo_alergia','severidad','agente','estado'];

    public function historia()
    {
    	return $this->belongsTo(historia_clinica::class,'id_historia','id_historia');
    }

}
