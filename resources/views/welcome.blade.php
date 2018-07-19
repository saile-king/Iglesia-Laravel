@extends('template')
@section('title', 'Miembros')
@section('content')

<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
<div class="container-fluid">
<div  class="row" >
<div class="col-lg-3">
    {!! Form::open(['route'=>'diezmos','method'=>'GET', 'class'=>'navbar-form']) !!}
                  <label>Año</label>
                  {!!Form::select('year',[
                  $anio=>$anio,
                  '2015'=>'2015',
                  '2016'=>'2016',
                  '2017'=>'2017',
                  '2018'=>'2018',
                  '2019'=>'2019',
                  '2020'=>'2020',
                  '2021'=>'2021',
                  '2022'=>'2022',
                  '2023'=>'2023',
                  ],null,
                  ['class'=>'form-control']) !!}
</div>


<div class="col-lg-3">
                  <label>Mes</label>
                  {!!Form::select('month',[
                  $mes=>$nombremes[intval($mes)],
                  '1'=>'ENERO',
                  '2'=>'FEBRERO',
                  '3'=>'MARZO',
                  '4'=>'ABRIL',
                  '5'=>'MAYO',
                  '6'=>'JUNIO',
                  '7'=>'JULIO',
                  '8'=>'AGOSTO',
                  '9'=>'SEPTIEMBRE',
                  '10'=>'OCTUBRE',
                  '11'=>'NOVIEMBRE',
                  '12'=>'DICIEMBRE',
                  ],null,
                  ['class'=>'form-control']) !!}

</div>

<div class="col-lg-3">
    <label>Concepto</label>
    {!!Form::select('concepto',$concept, null, array('class'=>'btn btn-dark form-control')) !!}
</div>


<div class="col-lg-3">
    <hr>
    {!!Form::submit('Crear Reporte', array('class'=>'btn btn-dark')) !!}
    {!!Form::close() !!}
</div>
</div>

<div  class="row" >
<br/>
<div class="col-lg-12">
    <div class="box box-primary">
        <div class="box-header">
        </div>

        <div class="box-body" id="div_grafica_barras">
        </div>

        <div class="box-footer">
        </div>
    </div>
</div>

@endsection