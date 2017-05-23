<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class antecedentes_historia extends Model
{
    //
    protected $table = 'antecedentes_historia';
    protected $primaryKey='id_antecedente_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo_antecedente','descripcion','estado'];

    public function historia()
    {
    	return $this->belongsTo(historia_clinica::class,'id_historia','id_historia');
    }
}
