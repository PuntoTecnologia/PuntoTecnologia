@extends ('mostrador.layout.layout')
@section('title')
	Gestion de Compras
@endsection
@section('script_header')
	<!-- tables -->
	<link rel="stylesheet" type="text/css" href="/mostrador/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="/mostrador/css/tables-style.css" />
	
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
	<link rel="stylesheet" href="/mostrador/css/font.css" type="text/css"/>
	<script src="/mostrador/js/screenfull.js"></script>
	<script src="/mostrador/js/jquery.cookie.js"></script>
	<link href="/mostrador/css/font-awesome.css" rel="stylesheet"> 
	<link rel="stylesheet" href="/mostrador/css/font.css" type="text/css"/>
	<script src="/mostrador/js/modernizr.js"></script>
	<script src="/mostrador/js/jquery.dataTables.min.js"></script>

	<script src="/mostrador/js/proton.js"></script>
	<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
		    $('#example').DataTable();
			} );
		</script>
@endsection
@section('content')

<div class="col-md-12">
		<!--LINEA SEPARADOR-->

		<div class="col-md-2">Remito N.
			<input type="text" class="form-control1" value="000{{ $remito_existente->id }}" readonly>
		</div>
		<div class="col-md-4">Proveedor
		<div class="input-group">							
			<span class="input-group-addon">
				<i class="">
					<button type="button" data-toggle="modal" data-target="#proveedor">...</button>
				</i>
			</span>
			<input type="text" class="form-control1" value="@foreach ($provers as $p) @if ($remito_existente->prov_id == $p->id){{$p->name}}@endif @endforeach">
		<!-- Trigger the modal with a button -->
		<!-- Modal -->
		<div id="proveedor" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- MODAL DE PROVEEDORES-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Listado de Proveedorores</h4>
		      </div>
		      <div class="modal-body">
		        <table id="table-no-resize">
					<tbody>
						@foreach ($provers as $prov)
					  		<tr>
						  		<td class="col-md-10"><span class="bt-content">{{ $prov->name }}</span></td>
								<td class="col-md-2"><span class="bt-content"><a href="/mostrador/punto_compra/prov_select/{{ $prov->id }}">Seleccionar</a></span></td>
							</tr>
						@endforeach
					</tbody>
					</tfoot>
				</table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- /Modal -->
		</div>
		</div>
		<div class="col-md-2">Cond.Pago
		
			<form id="cantidad" action="/mostrador/punto_compra/cond_pago" method="post">
				{{ csrf_field() }}
					<select name="cond_pago" onchange="submit()" class="form-control1">
						<option value="1" @if ($remito_existente->cond_pago == 1) selected @endif>Efectivo</option>
						<option value="2"@if ($remito_existente->cond_pago == 2) selected @endif>Cta. Cte</option>
					</select>
			</form>
		
		</div>
		<div class="col-md-2">Remito Proveedor
			<form action="/mostrador/punto_compra/referencia" method="post">
					{{ csrf_field() }}
					<input type="text" onchange="submit()" name="ref_rem_prov" class="form-control1" required value="{{ $remito_existente->ref_fact_prov }}">
			</form>
		</div>
		<div class="col-md-2">Fecha
		<input type="text" name="fecha" class="form-control1" value="{{ date("d-m-Y") }}" readonly>
		</div>
		<!--SALTO DE LINEA-->
		
		<!--LINEA SEPARADOR-->
		<div class="col-md-12" style="margin:1em;border-bottom: 1px solid #ccc;"></div>
		
		<div class="col-md-4 col-sd-offset-8" style="padding: 0;">
			<!--BUSCADOR POR CODIGO-->
			<div class="w3l_search" style="width: 100%;margin:0em;">
				<form id="codigo" action="/mostrador/punto_compra/search_code/0" method="post">
					{{ csrf_field() }}
					<input type="text" onchange="submit()" name="codigo" placeholder="Busqueda por codigo" required>
				</form>

				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#productos"><i class="fa fa-search" aria-hidden="true"></i></button>

				<!-- Modal 2-->
				<div id="productos" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Listado de Productos en Stock</h4>
				      </div>
				      <div class="modal-body">
				        <table id="example" class="table table-striped table-bordered" style="width:100%">
					        <thead>
					            <tr>
					                <th>Cod.</th>
					                <th>Titulo</th>
					                <th>Valor</th>
					                <th>Accion</th>
					            </tr>
					        </thead>
					        <tbody>
					        	@foreach ($product as $prod)
					              <tr>
					                <td>{{ $prod->codigo }}</td>
					                <td>{{ $prod->titulo }}</td>
					                <td>u${{ $prod->costo }}-</td>
					                <td><a href="/mostrador/punto_compra/search_code/{{ $prod->id }}">Seleccionar</a></td>
					              
					              </tr>
					            @endforeach
					        </tbody>
					    </table>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
				<!-- /Modal 2-->

			</div>
			<!--/BUSCADOR POR CODIGO-->
		</div>

		
		<!--TABLA FACTURA-->
		<table id="table-no-resize">
			<thead>
			  <tr>
				<th class="col-md-1">Cantidad</th>
				<th class="col-md-1">Codigo</th>
				<th class="col-md-5">Descripción</th>
				<th class="col-md-2">Unitario</th>
				<th class="col-md-2">Sub-Total</th>
				<th class="col-md-1">Accion</th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
			  	<!-- pongo los datos q me trae la table, despues hago consulta para traer los datos q me pida con join -->
			  	@php
			  	$total = 0
			  	@endphp
			  	@foreach ($temporal as $prod)
			  	@php
			  		
			  		$total = $total + ($prod->cantidad * $prod->costo_unit)

			  	@endphp
					              <tr>
					                <td>
					                	<form id="cantidad" action="/mostrador/punto_compra/cant/{{ $prod->id}}" method="post">
										{{ csrf_field() }}
										<input onchange="submit()" style="width:80%;padding: 0.3em" type="number" name="cantidad" value="{{ $prod->cantidad }}">
										</form>
									</td>
					                <td><span class="bt-content">{{ $prod->codigo }}</span></td>
					                <td><span class="bt-content"></span>{{ $prod->titulo }}</td>
					                <td>
										<form id="unitario" action="/mostrador/punto_compra/unitario/{{ $prod->id}}" method="post">
										{{ csrf_field() }}
										u$<input onchange="submit()" style="width:80%;padding: 0.3em" type="number" name="unitario" step="0,01" value="{{ $prod->costo_unit }}">-
										</form>
									</td>
					                <td><span class="bt-content">u${{ ($prod->cantidad * $prod->costo_unit) }}-</span></td>
					                <td>	
					                	<form action="/mostrador/punto_compra/destroy_rem_comp_tmp/{{ $prod->id }}" method="post" name="eliminar-categoria">
									      	{{ method_field('DELETE') }}
									      	{{ csrf_field() }}
								      		<button type="submit" class="btn btn-primary btn-delete">X</button>
									    </form>


					              </tr>
					            @endforeach
			</tbody>
			<tfoot>
				<tr>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;"><span class="bt-content"></span></td>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;""><span class="bt-content"></span></td>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;""><span class="bt-content"></span></td>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;""><span class="bt-content">Total:</span></td>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;""><span class="bt-content">u${{ $total }}-</span></td>
				<td style="background: #fff;border-bottom: 2px solid #fcb216;border-top: 2px solid #fcb216;""><span class="bt-content"></span></td>
			  </tr>
			</tfoot>
		  </table>

</div>
<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-2"></div>
	<div class="col-md-5"></div>
	<div class="col-md-2"></div>
	<div class="col-md-2">
		<div class="col-md-12">
				<div class="bg-effect">
					<ul class="bt-list" >
						<li><a style="padding: 1em 4.4em 1em 2em;" href="#" class="hvr-icon-bounce col-7">Terminar</a></li>
					</ul>
				</div>
		</div>
	</div>
</div>
@endsection