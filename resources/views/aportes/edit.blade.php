@extends('template')
@section('title', 'Editar Aporte')
<link href="{{asset('css/main.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('aportes.index')}}">Aportes</a>
        </li>
        <li class="breadcrumb-item active">Editar Aportes</li>
      </ol>
 </div>
 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-donate"></i> Editar Aportes </div>
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
				{!! Form::model($aporte, ['route' => ['aportes.update', $aporte->id], 'method'=>'PUT']) !!}
        	<fieldset>
			<legend>Datos de la Aporte</legend>
			<div>
			   {!!Form::label('miembro', 'Miembro: ') !!}
			   {{ Form::select('miembro', $miembro) }}
			   {!!Form::label('fecha', 'Fecha: ') !!}
			   {!!Form::date('fecha', null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
        	<div>
			   {!!Form::label('concepto', 'Concepto: ') !!}
			   {{ Form::select('concepto', $concepto) }}
			   {!!Form::label('valor', 'Valor: ') !!}
			   {!!Form::number('valor', null, array('required'=>'required', 'class'=>'textbox'))!!}
			</div>
			
			</fieldset><br>		
				<div class="text-right">
					<br>
					<a href="{{route('aportes.index')}}" class="btn btn-success tres"> Cancelar </a>
					{!!Form::submit('Actualizar',['class' => 'btn btn-primary tres'])!!}
				</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection