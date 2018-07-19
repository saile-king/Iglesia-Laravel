<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aporte extends Model
{
     protected $table = 'aportes';
    protected $fillable = [
        'id_concepto','fecha','valor','id_miembro',
    ];

    //Relacion con el modelo miembro
    public function miembro()
    {
    	return $this->belongsTo('App\Miembro','id_miembro');
    }

    //Relacion con el modelo concepto
    public function concepto()
    {
    	return $this->belongsTo('App\ConceptoAporte','id_concepto');
    }

     //Funcion para Buscar Clientes por el Nombre
    public function scopeBuscador($query, $year, $month, $concepto){
        return $query->whereMonth('fecha', '=', $month)->whereYear('fecha', '=', $year)->where('id_concepto','=',$concepto)->get();
    }
}

 