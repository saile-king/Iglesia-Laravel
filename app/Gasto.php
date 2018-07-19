<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
     protected $table = 'gastos';
    protected $fillable = [
        'concepto','fecha','valor',
    ];

     //Funcion para Buscar Clientes por el Nombre
    public function scopeBuscador($query, $year, $month){
        return $query->whereMonth('fecha', '=', $month)->whereYear('fecha', '=', $year)->get();
    }
}
