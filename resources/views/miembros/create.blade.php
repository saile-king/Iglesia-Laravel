@extends('template')
@section('title', 'Añadir Miembros')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('miembros.index')}}">Miembros</a>
        </li>
        <li class="breadcrumb-item active">Crear Miembro</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Registro de Miembros </div>
        <div class="card-body">
			@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			<div class="ver">
        	{!! Form::open(['route' => 'miembros.store']) !!}
        	<fieldset>
			<legend>Datos Personales</legend>
        	<div>
			   {!!Form::label('nombres', 'Nombres: ') !!}
			   {!!Form::text('nombres', null, array('required'=>'required'))!!}
			   {!!Form::label('apellidos', 'Apellidos: ') !!}
			   {!!Form::text('apellidos', null, array('required'=>'required'))!!}
			</div>
			<div>
			   {!!Form::label('identificacion', 'Tipo de Documento: ') !!}
			   {!!Form::select('identificacion', ['Cedula Ciudadania' => 'Cedula Ciudadania', 'Tarjeta Identidad' => 'Tarjeta de Identidad'])!!}
			   {!!Form::label('n_identificacion', 'Número de Documento: ') !!}
			   {!!Form::number('n_identificacion', null, array('required'=>'required'))!!}
			</div>
			<div>
			   {!!Form::label('nacimiento', 'Fecha de Nacimiento: ') !!}
			   {!!Form::date('nacimiento', null, array('required'=>'required'))!!}
			   {!!Form::label('lugar_nacimiento', 'Lugar de Nacimiento') !!}
			   {!!Form::text('lugar_nacimiento', null, array('required'=>'required'))!!}
			</div>
			<div>
			   {!!Form::label('genero', 'Género: ') !!}
			   {!!Form::select('genero', ['Masculino' => ' Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'tres'])!!}
			   {!!Form::label('estado', 'Estado Civil: ') !!}
			   {!!Form::select('estado_civil', ['Soltero(a)' => 'Soltero(a)', 'Casado(a)' => 'Casado(a)', 'Viudo(a)' => 'Viudo(a)'], null, ['class' => 'tres'])!!}
			   {!!Form::label('cabeza', 'Cabeza de Hogar: ') !!}
			   {!!Form::select('cabeza_hogar', ['No' => 'No','Si' => ' Si'], null, ['class' => 'tres'])!!}
			</div>
			<div>
			   {!!Form::label('minister', 'Ministerio: ') !!}
			   {!!Form::text('ministerio')!!}
			   {!!Form::label('profesion', 'Profesión: ') !!}
			   {!!Form::text('profesion', null, array('required'=>'required'))!!}
			</div>
			<div>
			{!!Form::label('estado', 'Estado Miembro: ') !!}
			   {!!Form::select('estado', ['Activo' => 'Activo','Inactivo' => 'Inactivo'])!!}
			</div>
			<div>
			   {!!Form::label('habilidades', 'Habilidades: ') !!}
			   {!!Form::textarea('habilidades', null, array('required'=>'required'))!!}
			</div>
			</fieldset><br>
			<fieldset>
			<legend>Datos de Residencia</legend>
				<div>
				   {!!Form::label('direccion', 'Dirección: ') !!}
				   {!!Form::text('direccion', null, array('required'=>'required'))!!}
				   {!!Form::label('barrio', 'Barrio: ') !!}
				   {!!Form::text('barrio', null, array('required'=>'required'))!!}	
				</div>
				<div>
				   {!!Form::label('departamento', 'Departamento: ') !!}
				   {{ Form::select('departamento', $depar, null, ['placeholder' => 'Seleccione un departamento...']) }}
				   {!!Form::label('ciudad', 'Municipio: ') !!}
				   {!!Form::select('ciudad',['placeholder' => 'Seleccionar municipio'])!!}	
				</div>
			</fieldset><br>
			<fieldset>
			<legend>Datos de Contacto</legend>
				<div>
				   {!!Form::label('celular', 'Celular: ') !!}
				   {!!Form::text('celular', null, array('required'=>'required'))!!}
				   {!!Form::label('telefono', 'Telefono: ') !!}
				   {!!Form::text('telefono')!!}	
				</div>
				<div>
				   {!!Form::label('email', 'Email: ') !!}
				   {!!Form::email('email', null, array('required'=>'required'))!!}
				</div>
				<div class="text-right">
					<br>
					<a href="{{route('miembros.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Guardar',['class' => 'btn btn-primary tres'])!!}
				</div>
			</fieldset>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
