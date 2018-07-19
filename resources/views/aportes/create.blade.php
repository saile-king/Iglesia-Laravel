@extends('template')
@section('title', 'Nueva Aporte')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('aportes.index')}}">Aportes</a>
        </li>
        <li class="breadcrumb-item active">Añadir Aporte</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-donate"></i> Registro de Aportes  <a class="btn btn-dark" href="#" data-toggle="modal" data-target="#create">Nuevo concepto</a></div>
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
				{!! Form::open(['route' => 'aportes.store']) !!}
        	<fieldset>
			<legend>Datos de la Ofrenda</legend>
			<div>
			   {!!Form::label('miembro', 'Miembro: ') !!}
			   {{ Form::select('miembro', $miembro, null, ['placeholder' => 'Seleccione un Miembro...']) }}
			   {!!Form::label('fecha', 'Fecha: ') !!}
			   {!!Form::date('fecha', \Carbon\Carbon::now(), null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
        	<div>
			   {!!Form::label('concepto', 'Concepto: ') !!}
			   {{ Form::select('concepto', $concepto, null, ['placeholder' => 'Seleccione El Concepto...']) }}
			   {!!Form::label('valor', 'Valor: ') !!}
			   {!!Form::number('valor', null, array('required'=>'required'))!!}
			</div>
			
			</fieldset><br>		
				<div class="text-right">
					<br>
					<a href="{{route('aportes.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Guardar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
	@include('concepto.create')

@endsection