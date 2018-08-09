@extends ('panel.layout.layout')
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
					
				</div>
				<div class="col-md-12">
					<form action="/EDITAR-CLIENTE/{{ $clients->id }}" method="post">	
					{{ csrf_field() }}
					{{ method_field('patch') }}
						<div class="col-md-12" style="margin-bottom:1em;margin-top: 1em;border-bottom: 1px solid #ccc;"></div>

						<div class="col-md-4"><h4 style="margin-bottom: 2em;">EDITAR CLIENTE</h4></div>
						<div class="col-md-5"><label style="float: right;">Creado</label></div>
						<div class="col-md-3">{{ $clients->updated_at }}</div>
						<div class="col-md-12" style="margin-bottom:1em;border-bottom: 1px solid #ccc;"></div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NOMBRE</label>
								<input type="text" class="form-control" value="{{ $clients->name }}" name="name" autofocus required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>APELLIDO</label>
								<input type="text" class="form-control" value="{{ $clients->last_name }}" name="last_name" autofocus required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>E-MAIL</label>
								<input type="email" class="form-control" value="{{ $clients->email }}" name="email" autofocus required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>TELEFONO</label>
								<input type="number" class="form-control" value="{{ $clients->telefono }}" name="telefono" autofocus required>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>CUIT-CUIL-DNI</label>
								<input type="number" class="form-control" value="{{ $clients->cuit_cuil }}" name="cuit_cuil" autofocus required>
							</div>
						</div>	
						<div class="col-md-6"></div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="margin-top: 1.5em;">Activo 
							    	Si <input name="active" value="1" type="radio" @if ($clients->active=='1')
					    		checked @endif>
							    	No <input name="active" value="0" type="radio" @if ($clients->active=='0')
					    		checked @endif>
							    </label>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<button style="margin-top: 1.2em;" type="submit">EDITAR CLIENTE</button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
</div>
@endsection