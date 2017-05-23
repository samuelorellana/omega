<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tratamientos_historia extends Model
{
    //
    protected $table = 'tratamientos_historia';
    protected $primaryKey='id_tratamiento_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','tratamiento','causa_tratamiento','modo_tratamiento','estado'];

    public function historia()
    {
    	return $this->belongsTo(historia_clinica::class,'id_historia','id_historia');
    }
}
