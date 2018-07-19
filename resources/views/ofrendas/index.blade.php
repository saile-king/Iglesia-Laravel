@extends('template')
@section('title', 'Ofrendas')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Ofrendas</li>
      </ol>
 </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-money-bill-wave"></i> Ofrendas
          <a class="btn btn-primary" href="{{route('ofrendas.create')}}" align="right"><i class="fa fa-plus-circle"></i> Nueva Ofrenda</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Concepto</th>
                  <th>Valor</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th></th>
                  <th>Total:</th>
                  <th colspan="2">${{number_format($total)}}.. {{number_format($mesT)}}</th>
                </tr>
              </tfoot>
              <tbody>
          @foreach($ofrenda as $item)
                <tr>
                  <td>{{$item->fecha}}</td>
                  <td>{{$item->concepto}}</td>
                  <td>${{number_format($item->valor)}}</td>
                  <td>
                    {!! Form::open(['route' => ['ofrendas.destroy', $item->id]]) !!}
                        <a class="btn btn-success" href="{{route('ofrendas.edit',$item->id)}}"><i class="fa fa-edit fa-2x"></i></a>
                          <input type="hidden" name="_method" value="DELETE">
                          <button onclick="return confirm('Eliminar Ofrenda?')" class="btn btn-danger"><i class="fa fa-trash fa-2x"></i></button>
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
