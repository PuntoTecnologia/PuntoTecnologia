@extends ('panel.layout.layout')
@section('script_add')
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0.5em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
					<h4>Listado de Planes</h4>
					<a href="/CREAR-PLAN" style="float: right; margin-bottom: 2em;margin-right: 2em;">
						<button type="button" class="btn btn-primary">Crear PLAN</button>
					</a>
					<div class="graph">
						<div class="content tab">
							<table id="tabla" class="display" cellspacing="0" width="100%">
						        <thead>
								    <tr>
								      <th scope="col">ID</th>
								      <th scope="col">TARJETA</th>
								      <th scope="col">CUOTAS</th>
								      <th scope="col">% INTERES</th>
								      <th scope="col">ACCIONES</th>
								    </tr>
								</thead>
						 
						        <tbody>
						        	@foreach ($planes as $plan)
							    		<tr>
									      <td class="col-md-1">{{ $plan->id }}</td>
									      <td class="col-md-4">{{ $plan->card }}</td>
									      <td class="col-md-2">{{ $plan->cuotas }}</td>
									      <td class="col-md-2">{{ $plan->coef }}</td>
									      <td class="col-md-3" style="display: inline-flex;">
											  	<form style="" method="post" action="/editar-plan/	{{ $plan->id }}">
											 	{{ csrf_field() }}
											 	{{ method_field('patch') }}
													 <button type="submit" class="btn btn-primary">Editar</button>
												</form>
											     <form style="margin-left: 0.5em;" action="/ELIMINAR-PLAN/{{$plan->id}}" method="post">
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