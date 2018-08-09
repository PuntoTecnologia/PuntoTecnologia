@extends ('panel.layout.layout')
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
					<p style="margin-bottom: 2em;">CREAR NUEVO CLIENTE</p>
				</div>
				<div class="col-md-12">
					<form action="CREAR-CLIENTE" method="post">	
					{{ csrf_field() }}
						<div class="col-md-4">
							<div class="form-group">
								<label>NOMBRE</label>
								<input type="text" class="form-control" name="name" autofocus required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>APELLIDO</label>
								<input type="text" class="form-control" name="last_name" autofocus required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>E-MAIL</label>
								<input type="email" class="form-control" name="email" autofocus required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>TELEFONO</label>
								<input type="number" class="form-control" name="telefono" autofocus required>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>CUIT-CUIL-DNI</label>
								<input type="number" class="form-control" name="cuit_cuil" autofocus required>
							</div>
						</div>	
						<div class="col-md-6"></div>
						<div class="col-md-3">
							<div class="form-group">
								<label style="margin-top: 1.5em;">Activo 
							    	Si <input name="active" value="1" type="radio" checked>
							    	No <input name="active" value="0" type="radio">
							    </label>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<button style="margin-top: 1.2em;" type="submit">CREAR CLIENTE</button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
</div>
@endsection