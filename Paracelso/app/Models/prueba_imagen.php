<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prueba_imagen extends Model
{
    //
    protected $table = 'prueba_imagen';
    protected $primaryKey = 'id';

    protected $fillable = ['nombre','pic'];
}
