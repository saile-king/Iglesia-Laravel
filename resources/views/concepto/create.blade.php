<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2> Nuevo Concepto de Aportes</h2>
				<button type="button" class="close" data-dismiss="modal">
					<i class="fa fa-times-circle"></i>
				</button>
			</div>
			<div class="modal-body">
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				{!! Form::open(['route' => 'concepto.store']) !!}
		    		<div class="form-group">
		    			{!! Form::text('nombre', null,array('class'=>'form-control',
		    			'required'=>'required',
		    			'placeholder'=>'Nombre Del Concepto...')) !!}
		    		</div>
		    		{!! Form::submit('Guardar Concepto', array('class'=>'btn btn-dark')) !!}
				{!! Form::close() !!}
					</div>
		</div>
	</div>
</div>