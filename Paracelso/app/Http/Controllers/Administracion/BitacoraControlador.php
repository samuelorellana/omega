<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;

class BitacoraControlador extends Controller
{
    //
    public function generar_bitacora($codigo_transaccion)
    {
    	$bitacora = new Bitacora;
    	$bitacora->codigo_transaccion = $codigo_transaccion;
    	$bitacora->codigo_institucion = Auth()->user()->codigo_institucion;
    	$bitacora->id_usuario = Auth()->user()->id;    	
    	$bitacora->save();
    	
    	return $bitacora->id_bitacora;
    }
}
