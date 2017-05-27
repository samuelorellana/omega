<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordenes_transferencia extends Model
{
    protected $table = 'ordenes_transferencia';
    protected $primaryKey = 'id_orden_transferencia';

    protected $fillable = ['id_bitacora','codigo_institucion','origen','id_origen','id_persona','id_medico','tipo_transferencia','motivo_transferencia','institucion','diagnosticos','notas','estado'];
}
