@extends ('mostrador.layout.layout')
@section('title')
	Gestion de ventas
@endsection
@section('script_header')
	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="/mostrador/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="/mostrador/css/basictable.css" />
	<script type="text/javascript" src="/mostrador/js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	      $('#table').basictable();

	      $('#table-breakpoint').basictable({
	        breakpoint: 768
	      });

	      $('#table-swap-axis').basictable({
	        swapAxis: true
	      });

	      $('#table-force-off').basictable({
	        forceResponsive: false
	      });

	      $('#table-no-resize').basictable({
	        noResize: true
	      });

	      $('#table-two-axis').basictable();

	      $('#table-max-height').basictable({
	        tableWrapper: true
	      });
	    });
	</script>
	<!-- //tables -->
@endsection
@section('content')
<div class="col-md-12">
	<form>
		<!--LINEA SEPARADOR-->
		<div class="col-md-12" style="margin:1em;border-bottom: 1px solid #ccc;"></div>
		<div class="col-md-2">N.Factura
		<input type="text" name="factura" class="form-control">
		</div>
		<div class="col-md-3">Vendedor
		<input type="text" name="vendedor" class="form-control" value="{{ auth::user()->name }}" readonly>
		</div>
		<div class="col-md-3">Lista
		<input type="text" name="lista" class="form-control">
		</div>
		<div class="col-md-2">Cond.Pago
		<input type="text" name="pago" class="form-control">
		</div>
		<div class="col-md-2">Fecha
		<input type="text" name="fecha" class="form-control">
		</div>
		<!--SALTO DE LINEA-->
		<!--LINEA SEPARADOR-->
		<div class="col-md-12" style="margin:1em;border-bottom: 1px solid #ccc;"></div>
		<div class="col-md-2">Cliente Id
		<input type="text" name="factura" class="form-control">
		</div>
		<div class="col-md-4">Apellido y Nombre
		<input type="text" name="vendedor" class="form-control">
		</div>
		<div class="col-md-3">Direccion
		<input type="text" name="lista" class="form-control">
		</div>
		<div class="col-md-3">Cuit | Dni
		<input type="text" name="fecha" class="form-control">
		</div>
		<!--SALTO DE LINEA-->
		<!--LINEA SEPARADOR-->
		<div class="col-md-12" style="margin:1em;border-bottom: 1px solid #ccc;"></div>
		<!--TABLA FACTURA-->
		<table id="table-no-resize">
					<thead>
					  <tr>
						<th class="col-md-1">Cantidad</th>
						<th class="col-md-2">Codigo</th>
						<th class="col-md-5">Descripcion</th>
						<th class="col-md-2">Unitario</th>
						<th class="col-md-2">Total</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td data-th="Name"><span class="bt-content">2</span></td>
						<td data-th="Age"><span class="bt-content">435354636</span></td>
						<td data-th="Gender"><span class="bt-content">Articulo de prueba de factura</span></td>
						<td data-th="Height"><span class="bt-content">15</span></td>
						<td data-th="Province"><span class="bt-content">30</span></td>
					  </tr>
					</tbody>
				  </table>

	</form>
</div>
@endsection