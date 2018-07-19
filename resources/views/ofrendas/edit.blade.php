@extends('template')
@section('title', 'Editar Ofrenda')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('ofrendas.index')}}">Ofrendas</a>
        </li>
        <li class="breadcrumb-item active">Editar Ofrenda</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-money-bill-wave"></i> Editar de Ofrendas </div>
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
				{!! Form::model($ofrenda, ['route' => ['ofrendas.update', $ofrenda->id], 'method'=>'PUT']) !!}
        	<fieldset>
			<legend>Datos de la Ofrenda</legend>
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
					<a href="{{route('ofrendas.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Actualizar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection