<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $fillable = ['nombre', 'direccion', 'telfijo', 'ciudad', 'celular', 'cedula'];
}
