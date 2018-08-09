@extends ('panel.layout.layout')
@section('script_add')
		<!-- jQuery File Upload Dependencies -->
		<script src="{{asset ('panel/js/script.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.knob.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.ui.widget.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset ('panel/js/jquery.fileupload.js') }}"></script>
		<link href="{{asset ('panel/css/style_upload.css') }}" rel="stylesheet" />
		<script type="text/javascript">
			function calcularprecio() {
				//GRABO INPUTS PARA LA CUENTA
				costo = parseFloat( document.getElementById("costo").value);
			        if (costo==''){costo=0;}
			        if (!costo){costo=0;}
			    rent = parseFloat(document.getElementById("rent").value);
			        if (rent==''){rent=0;}
			        if (!rent){rent=0;}    
			    iva = parseFloat(document.getElementById("iva").value);
			        if (iva==''){iva=0;}
			        if (!iva){iva=0;}
			    //AHORA ARMO EL CALCULO
			    var dolar = parseFloat({{ $dolar[0]->valor }});
			    //rentabilidad
			    calc = (costo*rent) / 100; 
			    //costo+rentabilidad
			    calc2 = parseFloat(calc) + parseFloat(costo);
			    //((costo+rentabilidad)*iva )/ 100 devuelve iva sin costo
			    calc3 = (calc2*iva) / 100; 
			    //calc3 devuelve iva solo entonces sumo calc2 para obtener el valor final
			    final = (calc3 + calc2).toFixed(2); 
			    final2 = (final*dolar).toFixed(2);
			    //LO MUESTRO EN UN INPUT
			    document.getElementById("precio").value = final2;


			}

		</script>
@endsection
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Panel 3.0 Pro || {{ Request::path() }}</h2>
					<form id="upload" method="post" action="CREAR_ARTICULO">
							{{ csrf_field() }}

						<div class="col-md-2">
						  <div class="form-group">
						    <label style="color: #fff;">Codigo</label>
						    <input class="form-control" name="codigo" placeholder="Codigo" required>
						  </div>
						</div>  
						<div class="col-md-8">
						  <div class="form-group">
						    <label style="color: #fff;">Titulo del Articulo</label>
						    <input class="form-control" name="titulo" placeholder="Producto Titulo" required>
						  </div>
						</div> 
						<div class="col-md-2">
						  <div class="form-group">
						    <label style="color: #fff;">Stock Mínimo</label>
						    <input class="form-control" name="minimo" placeholder="" required type="number" value="1">
						  </div>
						</div> 
					  
						<div class="col-md-4">
							<div class="form-group">
								<label style="color: #fff;">Marca</label>
								<select class="form-control" name="id_marca">
									<option></option>
									@foreach ($marcas as $marca)
										<option value="{{ $marca->id }}">{{ $marca->marca }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label style="color: #fff;">Proveedor</label>
								<select class="form-control" name="prover">
								<option></option>
									@foreach ($provers as $prover)
										<option value="{{ $prover->id }}">{{ $prover->name }}</option>
									@endforeach
									
								</select>
							</div>
						</div>

						<div class="col-md-4"> 
						  <div class="form-group"> 
						    <label style="color: #fff;">Categoria</label>
						    <select name="padre" class="form-control" required>
						      <option></option>
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
						<div class="col-md-12"> 
						  <div class="form-group">
						    <label style="color: #fff;">Descripcion del Articulo</label>
						    <textarea class="form-control" name="descripcion" rows="3" required></textarea>
						  </div>
						</div>
						

						<div class="col-md-3"> 
							<div class="form-group">
						    <label style="color: #fff;" >Costo u$</label>
						    <input class="form-control" name="costo" onchange="calcularprecio()" type="number" id="costo" placeholder="0" required  step="any">
						  </div>
						</div>
						<div class="col-md-3"> 
							<div class="form-group">
						    <label style="color: #fff;" >% Ganancia</label>
						    <input class="form-control" onchange="calcularprecio()" id="rent" name="rent" type="number" placeholder="0" required>
						  </div>
						</div>
						<div class="col-md-3"> 
							<div class="form-group">
						    <label style="color: #fff;">Iva</label>
						    	<select id="iva" name="iva" class="form-control" onchange="calcularprecio()">
						    		@foreach ($iva as $iva)
						    			<option value="{{ $iva->coef }}">{{ $iva->coef }}</option>
						    		@endforeach
						    	</select>
						  </div>
						</div>
						<div class="col-md-3"> 
							<div class="form-group">
						    <label style="color: #fff;">Efectivo</label>
						    <input class="form-control" name="precio" id="precio" type="number" value="0" required readonly>
						  </div>
						</div>
						<div class="col-md-3" style="padding-top: 2%;"> 
							<div class="form-group">
						    <label style="color: #fff;">
						    	Usado <input name="tipo" value="2" type="radio" style="margin-right: 0.5em;">
						    	Nuevo <input name="tipo" value="1" type="radio" checked>
						    	</label>
						 	</div>   
						</div>
						<div class="col-md-2" style="padding-top: 2%;"> 
							<div class="form-group">
						    <label style="color: #fff;">Oferta ? 
						    	Si <input name="oferta" value="1" type="radio">
						    	No <input name="oferta" value="0" type="radio" checked>
						    	</label>
						 	</div>   
						</div>
						<div class="col-md-5"></div>
						<div class="col-md-2" style="margin-top: 2%;">
							<button type="submit" class="btn btn-primary">Crear Articulo</button> 
						</div>
					</form>
			</div>
		</div>
</div>

@endsection
@section('script_add')

@endsection