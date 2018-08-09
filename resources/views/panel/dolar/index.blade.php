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
					<h4>Ingrese Dolar Actual</h4>
					<div class="col-md-12">
						<form method="post" action="/new_dolar">
						{{ csrf_field() }}
						<div class="col-md-6"></div>
							<div class="col-md-4">
								<label>Nuevo Valor</label>
								<input type="number" name="dolar" class="form-control" step="any">
							</div>
							<div class="col-md-2">
								<input style="margin-top: 1.5em;" type="submit" value="Grabar Dolar" class="form-control">
							</div>
						</form>
					</div>
					<h2 class="form-title" style="margin-top: 3em;color:#fff;">Historico de Dolar</h2>
					<div class="content tab">
					<div class="col-md-12" style=""></div>
							<table id="tabla" class="display" cellspacing="0" width="100%">
						        <thead>
								    <tr>
								      <th scope="col">ID</th>
								      <th scope="col">VALOR</th>
								      <th scope="col">FECHA</th>
								    </tr>
								</thead>
						 
						        <tbody>
						        	@foreach ($dolar_t as $dolar_v)
							    		<tr>
									      <td class="col-md-2">{{ $dolar_v->id }}</td>
									      <td class="col-md-6">${{ $dolar_v->valor }}-</td>
									      <td class="col-md-4">{{ $dolar_v->created_at }}</td>
									    </tr>
								    @endforeach
								  </tbody>
						    </table>
										
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