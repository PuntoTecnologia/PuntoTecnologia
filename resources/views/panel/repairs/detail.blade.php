@extends ('panel.layout.layout')
@section('title')
	SISTEMA DE GESTION DE TALLER (Ingrese Nueva orden de trabajo).
@endsection
@section('script_add')
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
			<div id="tabs" class="tabs">
				<div class="col-md-12 form-title" style="margin-bottom: 1em;">
					<h3 class="" style="margin-bottom: 0.5em;float:right;color: #fff;">DETALLE DE LA ORDEN DE TRABAJO {{ $repair[0]->id }}</h3>
				</div>
				<form method="post" action="/ACTUALIZAR-ORDEN/{{ $repair[0]->id }}">
				{{ csrf_field() }}
				<div class="col-md-12">
					<h2>Datos Cliente</h2>
				</div>
				<div class="col-md-2">
					<a href="#clients" style="background: #868686 !important;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						<img src="/images/icocli.png" style=" width: 100%;">
					</a>
				</div>
				<!-- SI $id NO ESTA VACIA, ENTONCES RECORRO Y OBTENGO CLIENTE -->
				
				<div class="col-md-5">
					<label>Nombre</label>
					<input type="hidden" name="client_id" value="{{ $repair[0]->client_id }}">
					<input value="{{ $repair[0]->name }}" class="form-control" type="text" name="name" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-5">
					<label>Apellido</label>
					<input value="{{ $repair[0]->last_name }}" class="form-control" type="text" name="last_name" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-2">
					<label>Cuit - Cuil - Dni</label>
					<input value="{{ $repair[0]->cuit_cuil }}" class="form-control" type="text" name="cuit_cuil" style="width: 100%;" required readonly>
				</div>
				<!-- //////////////////////////////////////////////  -->
				<div class="col-md-4">
					<label>Telefono</label>
					<input value="{{ $repair[0]->telefono }}" class="form-control" type="text" name="telefono" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-4">
					<label>Correo Electronico</label>
					<input value="{{ $repair[0]->email }}" 	class="form-control" type="text" name="id" style="width: 100%;" required readonly>
				</div>
				<!-- //////////////////////////////////////////////  -->
				<div class="col-md-12">
					<h2>Datos Equipo</h2>
				</div>
				<div class="col-md-8">
				<label>Marca / Modelo</label>
					<input value="{{ $repair[0]->marca_modelo }}" class="form-control" type="text" name="marca_modelo" style="width: 100%;" required disabled>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<label style="margin-bottom: 0.5em;">Salvar datos</label>
					si <input type="radio" name="datos" value="1" required @if ($repair[0]->datos == 1)
						checked 
					@endif disabled>
					no <input type="radio" name="datos" value="0"@if ($repair[0]->datos == 0)
						checked 
					@endif disabled>
				</div>
				
				<div class="col-md-12" style="margin-top:1em;">
					<label>Problema / Trabajo a realizar</label>
					<textarea name="descripcion" rows="4" style="width:100%;" required disabled> {{ $repair[0]->descripcion }}</textarea>
				</div>
				<div class="col-md-12">
					<h2>Observacion / Reparacion</h2>
				</div>
				<div class="col-md-4" style="display: inline-flex;">
					<label style="margin-top: 0.5em;margin-right: 0.5em;">Valor Reparacion $</label>
					<input type="number" value="{{ $repair[0]->precio }}" name="precio" style="width: 6em;" class="form-control">
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<select name="state" class="form-control">
						@foreach ($states as $state)
							<option @if ($state->id == $repair[0]->estado)
								selected
							@endif value="{{ $state->id }}">{{ $state->state }}</option>
						@endforeach
						
					</select>
				</div>
				<div class="col-md-12" style="margin-top:1em;">
					<label>Observacion / Presupuesto</label>
					<textarea name="observacion" rows="4" style="width:100%;" required>{{ $repair[0]->observacion }}</textarea>
				</div>
				<div class="col-md-12 form-title" style="margin-bottom: 1em;">
					<button type="submit" style="float: right;" class="btn btn-primary">Terminar</button>
					<a href="/TALLER" style="float: right;margin-right: 0.5em;" class="btn btn-primary">Volver</a>
				</div>
				
				</form>
			</div>
		</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endsection