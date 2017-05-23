<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class diagnosticos_historia extends Model
{
    //
    protected $table = 'diagnosticos_historia';
    protected $primaryKey='id_diagnostico_historia';
    public $timestamps = false;
    protected $fillable = ['id_historia','id_bitacora','diagnostico','agudo_cronico','comentario','estado'];

    public function historia()
    {
    	return $this->belongsTo(historia_clinica::class,'id_historia','id_historia');
    }
}
