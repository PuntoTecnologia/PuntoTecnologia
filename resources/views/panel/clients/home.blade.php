@extends ('panel.layout.layout')
@section('script_add')
	<link rel="stylesheet" href="/panel/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0.5em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
					<h4>Listado de Clientes</h4>
					<a href="/CREAR-CLIENTE" style="float: right; margin-bottom: 2em;margin-right: 2em;">
						<button type="button" class="btn btn-primary">Crear Cliente</button>
					</a>
					<div class="graph">
						<div class="content tab">
							<table id="tabla" class="display" cellspacing="0" width="100%">
						        <thead>
								    <tr>
								      <th scope="col">ID</th>
								      <th scope="col">CLIENTE</th>
								      <th scope="col">E-MAIL</th>
								      <th scope="col">TELEFONO</th>
								      <th scope="col">CUIT-CUIL</th>
								      <th scope="col"></th>
								      <th scope="col"></th>
								    </tr>
								</thead>
						 
						        <tbody>
								    @foreach ($lista_clients as $element)
									    	<tr style="@if ($element->active == '0') background: bisque;
									    	@endif">
											      <td class="col-md-1">{{ $element->id }}</td>
											      <td class="col-md-2">{{ $element->last_name }} {{ $element->name }}</td>
											      <td class="col-md-1">{{ $element->email }}</td>
											      <td class="col-md-2">{{ $element->telefono }}</td>
											      <td class="col-md-1">{{ $element->cuit_cuil }}</td>
											      <td class="col-md-1">
											      	<form action="/EDITAR-CLIENTE/{{ $element->id }}" method="post">
											      		{{ csrf_field() }}
											      		<input style="background: #868686 !important;" type="submit" class="btn btn-primary" value="Editar">
											      	</form>
											      </td>
											      <td class="col-md-1">
											      	<form action="/ELIMINAR-CLIENTE/{{$element->id}}" method="post" name="eliminar-categoria">

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
	<!--/tabs-inner-->
		
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