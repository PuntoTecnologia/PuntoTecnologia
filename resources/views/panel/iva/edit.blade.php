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
					<h4>Editar Iva</h4>
					<form id="upload" method="post" action="/EDITAR-IVA/{{ $iva->id }}">
						{{ csrf_field() }}
							{{ method_field('PATCH') }}
						<div class="col-md-4">
							<div class="form-group">
								<label>COEFICIENTE DE IVA</label>
									<input type="text" name="coef" class="form-control" value="{{ $iva->coef }}">
							</div>
						</div>
						<div class="col-md-3" style="margin-top: 2%;">
							<button type="submit" class="btn btn-primary">EDITAR</button>
							
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
					if(confirm('Seguro deseas modificar este plan ?')){
						$(this).parents('form:first').submit();
					}
				})
		</script>
@endsection