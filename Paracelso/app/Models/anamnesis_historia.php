<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anamnesis_historia extends Model
{
    //
    protected $table = 'anamnesis_historia';
    protected $primaryKey='id_anamnesis_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tipo','descripcion','estado'];

    public function historia()
    {
    	return $this->belongsTo(historia_clinica::class,'id_historia','id_historia');
    }
}
