<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembros';
    protected $fillable = [
        'nombres','apellidos','identificacion','n_identificacion','genero','estado_civil','cabeza_hogar','nacimiento','lugar_nacimiento','ministerio','profesion','estado','habilidades','direccion','barrio','departamento','ciudad','celular','telefono','email',
    ];

    //Relacion con el modelo aporte
    public function aporte()
    {
        return $this->hasMany('App\Aporte');
    }
}
