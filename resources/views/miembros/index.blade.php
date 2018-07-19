@extends('template')
@section('title', 'Miembros')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Miembros</li>
      </ol>
 </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Miembros de la Iglesia
          <a class="btn btn-primary" href="{{route('miembros.create')}}" align="right"><i class="fa fa-plus-circle"></i> Nuevo Miembro</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Identificacion</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Identificacion</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
          @foreach($miembros as $item)
                <tr>
                  <td>{{$item->nombres}}</td>
                  <td>{{$item->apellidos}}</td>
                  <td>{{$item->n_identificacion}}</td>
                  <td class="@if($item->estado == 'Inactivo') table-danger @else table-success @endif">{{$item->estado}}</td>
                  <td>
                    <a style="display:inline" class="btn btn-success" href="{{route('miembros.show',$item->id)}}"><i class="fa fa-eye"></i></a>
                    {!! Form::open(['route' => ['miembros.destroy', $item->id],'style'=>'display:inline']) !!}
                          <input type="hidden" name="_method" value="DELETE">
                          <button onclick="return confirm('Eliminar Miembro?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    </div>



@endsection
