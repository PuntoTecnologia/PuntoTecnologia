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
					<h4>Listado de Condiciones de IVA</h4>
					<a href="/CREAR-IVA" style="float: right; margin-bottom: 2em;margin-right: 2em;">
						<button type="button" class="btn btn-primary">Crear Nueva Condición</button>
					</a>
					<div class="graph">
						<div class="content tab">
							<table id="tabla" class="display" cellspacing="0" width="100%">
						        <thead>
								    <tr>
								      <th scope="col">ID</th>
								      <th scope="col">COEFICIENTE</th>
								      <th scope="col">ACCIONES</th>
								    </tr>
								</thead>
						 
						        <tbody>
						        	@foreach ($ivas as $iva)
							    		<tr>
									      <td class="col-md-2">{{ $iva->id }}</td>
									      <td class="col-md-7">{{ $iva->coef }}</td>
									      <td class="col-md-3" style="display: inline-flex;">
											  	<form style="" method="post" action="/editar-iva/	{{ $iva->id }}">
											 	{{ csrf_field() }}
											 	{{ method_field('patch') }}
													 <button type="submit" class="btn btn-primary">Editar</button>
												</form>
											     <form style="margin-left: 0.5em;" action="/ELIMINAR-IVA/{{$iva->id}}" method="post">
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