<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table = 'bitacoras';
    protected $primaryKey='id_bitacora';

    public function instituciones()
    {
    	return $this->belongsTo(instituciones::class,'codigo_institucion','codigo_institucion');
    }

    public function transacciones()
    {
    	return $this->belongsTo(transacciones::class,'codigo_transaccion','codigo_transaccion');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id','id_usuario');
    }
}
