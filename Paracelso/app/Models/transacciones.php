<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transacciones extends Model
{
    //
    protected $table = 'pa_transacciones';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo_transaccion','descripcion','abreviacion','estado'];

    public function bitacoras()
    {
    	return $this->hasMany(Bitacora::class,'codigo_transaccion','codigo_transaccion');
    }
}
