@extends('template')
@section('title', 'Vista Miembro')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('miembros.index')}}">Miembros</a>
        </li>
        <li class="breadcrumb-item active">Ver Más</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Vista de Miembros  <a class="btn btn-success" href="{{route('miembros.edit',$miembro->id)}}"><i class="fa fa-edit"></i> Editar</a></div>
        <div class="card-body">
        	<div class="ver">
        	<form action="">
        	<fieldset>
			<legend>Datos Personales </legend>
        	<div>
			   <label for="nombres">Nombres: </label>
			   <input type="text" name="nombres" value="{{$miembro->nombres}}" readonly>
			   <label for="apellidos">Apellidos: </label>
			   <input type="text" name="apellidos" value="{{$miembro->apellidos}}" readonly>
			</div>
			<div>
			   <label for="nombres">Tipo de Documento: </label>
			   <input type="text" name="nombres" value="{{$miembro->identificacion}}" readonly>
			   <label for="apellidos">Número de Documento: </label>
			   <input type="text" name="apellidos" value="{{$miembro->n_identificacion}}" readonly>
			</div>
			<div>
			   <label for="nombres">Género: </label>
			   <input type="text" name="genero" class="tres" value="{{$miembro->genero}}" readonly>
			   <label for="apellidos">Estado Civil: </label>
			   <input type="text" name="apellidos" class="tres" value="{{$miembro->estado_civil}}" readonly>
			   <label for="apellidos">Cabeza de Hogar: </label>
			   <input type="text" name="apellidos" class="tres" value="{{$miembro->cabeza_hogar}}" readonly>
			</div>
			<div>
			   <label for="nombres">Ministerio: </label>
			   <input type="text" name="nombres" value="{{$miembro->ministerio}}" readonly>
			   <label for="apellidos">Profesión: </label>
			   <input type="text" name="apellidos" value="{{$miembro->profesion}}" readonly>
			</div>
			<div>
				<label for="nombres">Estado: </label>
			    <input type="text" name="estado" value="{{$miembro->estado}}" readonly>
			</div>
			<div>
			   <label for="nombres">Habilidades: </label>
			   <textarea readonly>{{$miembro->habilidades}}</textarea>
			</div>
			<div>
			   
			</div>
			</fieldset><br>
			<fieldset>
			<legend>Datos de Residencia</legend>
				<div>
			   <label for="nombres">Dirección: </label>
			   <input type="text" name="nombres" value="{{$miembro->direccion}}" readonly>
			   <label for="apellidos">Barrio: </label>
			   <input type="text" name="apellidos" value="{{$miembro->barrio}}" readonly>
				</div>
				<div>
			   <label for="nombres">Departamento: </label>
			   <input type="text" name="nombres" value="{{$miembro->departamento}}" readonly>
			   <label for="apellidos">Municipio: </label>
			   <input type="text" name="apellidos" value="{{$miembro->ciudad}}" readonly>  
				</div>
			</fieldset><br>
			<fieldset>
			<legend>Datos de Contacto</legend>
				<div>
			   <label for="nombres">Celular: </label>
			   <input type="text" name="nombres" value="{{$miembro->celular}}" readonly>
			   <label for="apellidos">Telefono: </label>
			   <input type="text" name="apellidos" value="{{$miembro->telefono}}" readonly>
				</div>
				<div>
			   <label for="nombres">Email: </label>
			   <input type="text" name="nombres" value="{{$miembro->email}}" readonly>
				</div>
				
			</fieldset>
			</div>
		</div>
	</div>

@endsection


