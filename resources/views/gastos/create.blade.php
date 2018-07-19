@extends('template')
@section('title', 'Nuevo Gasto')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('gastos.index')}}">Gastos</a>
        </li>
        <li class="breadcrumb-item active">Añadir Gasto</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-holding-usd"></i> Registro de Gastos </div>
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
				{!! Form::open(['route' => 'gastos.store']) !!}
        	<fieldset>
			<legend>Datos de Gastos</legend>
        	<div>
			   {!!Form::label('concepto', 'Concepto: ') !!}
			   {!!Form::text('concepto', null, array('required'=>'required'))!!}
			   {!!Form::label('valor', 'Valor: ') !!}
			   {!!Form::number('valor', null, array('required'=>'required'))!!}
			</div>
			<div>
			   {!!Form::label('fecha', 'Fecha: ') !!}
			   {!!Form::date('fecha', \Carbon\Carbon::now(), null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
			</fieldset><br>		
				<div class="text-right">
					<br>
					<a href="{{route('gastos.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Guardar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
