<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConceptoAporte extends Model
{
    protected $table = 'concepto_aportes';
    protected $fillable = [
        'nombre',
    ];

     //Relacion con el modelo aporte
    public function aporte()
    {
        return $this->hasMany('App\Aporte');
    }
}
