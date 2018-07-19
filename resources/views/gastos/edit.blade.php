@extends('template')
@section('title', 'Editar Gasto')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('gastos.index')}}">Gastos</a>
        </li>
        <li class="breadcrumb-item active">Editar Gasto</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-holding-usd"></i> Editar Gasto </div>
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
				{!! Form::model($gasto, ['route' => ['gastos.update', $gasto->id], 'method'=>'PUT']) !!}
        	<fieldset>
			<legend>Datos de Gastos</legend>
        	<div>
			   {!!Form::label('concepto', 'Concepto: ') !!}
			   {!!Form::text('concepto', null, array('required'=>'required', 'class'=>'textbox'))!!}
			   {!!Form::label('valor', 'Valor: ') !!}
			   {!!Form::number('valor', null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
			<div>
			   {!!Form::label('fecha', 'Fecha: ') !!}
			   {!!Form::date('fecha', null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
			</fieldset><br>		
				<div class="text-right">
					<br>
					<a href="{{route('gastos.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Actualizar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>

@endsection