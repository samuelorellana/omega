<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class revisiones_consultas extends Model
{
    //
    protected $table = 'revisiones_consultas';
    protected $primaryKey = 'id_revision_consulta';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_consulta','revision_general','cabeza_cuello','torax','miembros_superiores','abdomen','genital_urinario','miembros_inferiores','neurologico','otros','estado'];

    public function consulta()
    {
    	return $this->belongsTo(consultas::class,'id_consulta','id_consulta');
    }
}
