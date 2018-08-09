@extends ('panel.layout.layout')
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
					<p style="margin-bottom: 2em;">CREAR NUEVA CATEGORIA</p>
				</div>
				<div class="col-md-12">
					<form action="CREAR-CATEGORIA" method="post">	
					{{ csrf_field() }}
						<div class="col-md-3">
							<div class="form-group">
								<label>CATEGORIA</label>
								<input type="text" name="nombre" autofocus required>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>SUB-CATEGORIA DE</label>
								<select name="padre" class="form-control" required>
							      <option value="0"></option>
							      @foreach ($lista_categorias as $categoria)
							      	<option value="{{ $categoria->id }}">
									
									@if ($categoria->padre ==0)
										Principal
									
									@else
									
											@foreach ($lista_categorias as $sub_categoria)
												@if ($sub_categoria->id == $categoria->padre)
													{{ $sub_categoria->nombre }}
												@endif
											@endforeach
									@endif
									-->
							      	{{ $categoria->nombre }}</option>
							      @endforeach
							    </select>
							</div>
						</div>	
						
						<div class="col-md-3">
							<div class="form-group" style="float: right;padding-right:10%;">
								<label style="margin-top: 1.5em;">Activa 
							    	Si <input name="active" value="1" type="radio" checked>
							    	No <input name="active" value="0" type="radio">
							    </label>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<button style="margin-top: 1.2em;" type="submit">CREAR CATEGORIA</button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
</div>
@endsection