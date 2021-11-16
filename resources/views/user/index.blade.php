@extends('template')
@section('title', 'Usuarios')
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Usuarios</li>
      </ol>
 </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-money-bill-wave"></i> Ofrendas
          <a class="btn btn-primary" href="" align="right"><i class="fa fa-plus-circle"></i> Nuevo Usuario</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Perfil</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tfoot>
                  <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Perfil</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
              <tbody>
          @foreach($user as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->perfil->nombre}}</td>
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
