@extends('template')
@section('title', 'Aportes')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Aportes</li>
      </ol>
 </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-donate"></i> Aportes
          <a class="btn btn-primary" href="{{route('aportes.create')}}" align="right"><i class="fa fa-plus-circle"></i> Nuevo Aporte</a>
        </div>

<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
<div class="container-fluid">
<div  class="row card-footer small text-muted">
<div class="col-lg-3">
    {!! Form::open(['route'=>'aportespdf','method'=>'GET', 'class'=>'navbar-form']) !!}
                  Año
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
                  Mes
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
    Concepto
    {!!Form::select('concepto',$concept, null, array('class'=>'btn btn-dark form-control')) !!}
</div>


<div class="col-lg-3">
    <br>
    {!!Form::submit('Crear Reporte', array('class'=>'btn btn-dark form-control')) !!}
    {!!Form::close() !!}
</div>
</div>
</div>


        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Miembro</th>
                  <th>Concepto</th>
                  <th>Valor</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th colspan="2"></th>
                  <th>Total:</th>
                  <th colspan="2">${{number_format($total)}}</th>
                </tr>
              </tfoot>
              <tbody>
          @foreach($aporte as $item)
                <tr>
                  <td>{{$item->fecha}}</td>
                  <td>{{$item->miembro->nombres}}</td>
                  <td>{{$item->concepto->nombre}}</td>
                  <td>${{number_format($item->valor)}}</td>
                  <td>
                    {!! Form::open(['route' => ['aportes.destroy', $item->id]]) !!}
                        <a class="btn btn-success" href="{{route('aportes.edit',$item->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                          <input type="hidden" name="_method" value="DELETE">
                          <button onclick="return confirm('Eliminar Aporte?')" class="btn btn-danger"><i class="fa fa-trash fa-2x"></i></button>
                    {!! Form::close() !!}
                  </td>
                </tr>
          @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

@endsection
