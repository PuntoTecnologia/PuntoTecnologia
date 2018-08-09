@extends ('panel.layout.layout')
@section('title')
	Panel 3.0 || Gestion en linea || By  Promedios
@endsection
@section('script_add')
	<link rel="stylesheet" href="/panel/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0.5em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
					<h4>Listado de Proveedores</h4>
					<a href="/CREAR-PROVEEDOR" style="float: right;margin-bottom:2em;margin-right: 2em;">
						<button type="button" class="btn btn-primary">Crear Proveedor</button>
					</a>
					<div class="graph">
						<div class="content tab">
							<table id="tabla" class="display" cellspacing="0" width="100%">
						        <thead>
								    <tr>
								      <th scope="col">Orden</th>
								      <th scope="col">Proveedor Nombre</th>
								      <th scope="col">Direccion</th>
								      <th scope="col">E-mail</th>
								      <th scope="col">Cuit / Cuil</th>
								      <th scope="col"></th>
								    </tr>
								</thead>
						 
						        <tbody>
					            		@foreach ( $provers as $prover)
									    	<tr>
										      <td class="col-md-1">{{ $prover->id }}</td>
										      <td class="col-md-3">{{ $prover->name }}</td>
										      <td class="col-md-3">{{ $prover->direccion }}</td>
										      <td class="col-md-2">{{ $prover->email }}</td>
										      <td class="col-md-2">{{ $prover->cuit_cuil }}</td>
										      <td class="col-md-1" style="display: inline-flex;">
										      	<a href="/EDITAR-PROVER/{{ $prover->id }}" class="btn btn-primary">Editar</a>
										      	<form style="margin-left: 0.5em;" action="/ELIMINAR-PROVER/{{$prover->id}}" method="post">

											      	{{ method_field('DELETE') }}
											      	{{ csrf_field() }}
										      		<button type="button" class="btn btn-primary btn-delete">Eliminar</button>
										      	
										      	</form>
										      </td>
										    </tr>
									    @endforeach
										    
						        </tbody>
						    </table>
										
						</div><!-- /content -->
					</div>
				<!-- /tabs -->
			</div>
		</div>
</div>
@endsection
@section('script')
	<script>
		$('.btn-delete').on('click', function(e){
					if(confirm('Seguro deseas eliminar este cliente ?')){
						$(this).parents('form:first').submit();
					}
				})
		</script>
@endsection