@extends('template')
@section('title', 'Nueva Ofrenda')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('ofrendas.index')}}">Ofrendas</a>
        </li>
        <li class="breadcrumb-item active">Añadir Ofrenda</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-money-bill-wave"></i> Registro de Ofrendas </div>
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
				{!! Form::open(['route' => 'ofrendas.store']) !!}
        	<fieldset>
			<legend>Datos de la Ofrenda</legend>
        	<div>
			   {!!Form::label('concepto', 'Concepto: ') !!}
			   {!!Form::text('concepto', null, array('required'=>'required'))!!}
			   {!!Form::label('valor', 'Valor: ') !!}
			   {!!Form::number('valor', null, array('required'=>'required'))!!}
			</div>
			<div>
			   {!!Form::label('fecha', 'Fecha: ') !!}
			   {!!Form::date('fecha', \Carbon\Carbon::now())!!}
			</div>
			</fieldset><br>		
				<div class="text-right">
					<br>
					<a href="{{route('ofrendas.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Guardar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection


