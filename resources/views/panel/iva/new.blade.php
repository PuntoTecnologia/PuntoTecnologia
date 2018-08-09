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
					<h4>Cargar Condiciones de Iva</h4>
					<form method="post" action="/crear-iva">
					{{ csrf_field() }}
						<div class="col-md-4">
							<label>COEFICIENTE DE IVA</label>
							<input type="text" name="coef" class="form-control" placeholder="10.5, 21 , etc.">
						</div>
						<div class="col-md-12" style="margin-top: 2%;">
							<center>
								<button type="submit" class="btn btn-primary">Crear IVA</button>
							</center>
						</div>
					</form>
					
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