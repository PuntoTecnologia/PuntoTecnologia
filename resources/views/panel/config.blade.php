@extends ('panel.layout.layout')
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div style="padding-bottom: 4em;">	
				
				<form method="post" action="ACTUALIZA-WEB-TITULO" name="title-presset">
				{{ csrf_field() }}
				<h2 class="form-title" style="color: #fff;">TITULO DEL SITIO
					<button type="submit" class="btn btn-primary" style="float: right;">Actualizar</button>
				</h2>
				<h3>Aqui debe ingresar el titulo principal del sitio. El mismo debe contener una breve descripcion del sitio, la cual se representara en cada sector del portal.</h3>
				<div class="col-md-12">
				@foreach ($title as $title)
					@php
						$title=$title->title;
					@endphp
				@endforeach
						<textarea rows="2" name="title" style="width: 100%;" placeholder="Titulo del sitio || Mar del Plata || Bs As | Argentina" required>@if (isset($title)) {{ $title }}@endif </textarea>
					</div>
				</form>
				
				<div class="clearfix"> </div>
				<div class="clearfix"> </div>
				<div class="clearfix"> </div>

				<form action="/CONFIGURACION" method="post" name="metakeys">
				{{ csrf_field() }}
					<h2 class="form-title" style="color: #fff;">META KEYWORDS
						<button type="submit" class="btn btn-primary" style="float: right;">Actualizar</button>
					</h2>
					<h3>Las etiquetas meta, son etiquetas que le permiten a los motores de busqueda como google, transmitir informacion en sus indexaciones. Se recomienda no extender demasiado cada unal de ellas, en los posible entre 4 y 6 palabras que conformen fraces que representen lo que el portal brinda a sus visitantes en forma breve.</h3>
					
					@foreach ($meta_key as $key)
					@php
						$key1=$key->key1;
						$key2=$key->key2;
						$key3=$key->key3;
						$key4=$key->key4;
						$key5=$key->key5;
						$key6=$key->key6;
						$key7=$key->key7;
						$key8=$key->key8;
					@endphp
					@endforeach
							<div class="col-md-3">
								<label>Meta1</label>
								<input type="text" name="key1" @if (isset($key1)) value="{{ $key1 }}"@endif placeholder="computacion en mar del plata" required value="">
							</div>
							<div class="col-md-3">
								<label>Meta2</label>
								<input type="text" name="key2"@if (isset($key2)) value="{{ $key2 }}"@endif placeholder="ropa mujer y hombre" required>
							</div>
							<div class="col-md-3">
								<label>Meta3</label>
								<input type="text" name="key3" @if (isset($key3)) value="{{ $key3 }}"@endif placeholder="muebles pino buena calidad" required>
							</div>
							<div class="col-md-3">
								<label>Meta4</label>
								<input type="text" name="key4" @if (isset($key4)) value="{{ $key4 }}"@endif placeholder="juegos peliculas cine salida" required>
							</div>
							<div class="col-md-3">
								<label>Meta5</label>
								<input type="text" name="key5" @if (isset($key5)) value="{{ $key5 }}"@endif placeholder="perros gatos veterinaria" required>
							</div>
							<div class="col-md-3">
								<label>Meta6</label>
								<input type="text" name="key6" @if (isset($key6)) value="{{ $key6 }}"@endif placeholder="comida artesanal domicilio" required>
							</div>
							<div class="col-md-3">
								<label>Meta7</label>
								<input type="text" name="key7" @if (isset($key7)) value="{{ $key7 }}"@endif placeholder="lavado auto barato calidad" required>
							</div>
							<div class="col-md-3">
								<label>Meta8</label>
								<input type="text" name="key8" @if (isset($key8)) value="{{ $key8 }}"@endif placeholder="venta cosmetica peluqueria insumos" required>
							</div>

					<div class="clearfix"> </div>
				</div>	
				</form>
				<form method="post" action="/ACTUALIZA-META-DESCRIPCION" name="form-meta-descipt">
				{{ csrf_field() }}
					<h2 class="form-title" style="color: #fff;">META DESCIPCION
						<button type="submit" class="btn btn-primary" style="float: right;">Actualizar</button>
					</h2>
					<h3>Al igual que las etiquetas meta, ayuda a la index y seo del portal, pero en este caso la description es algo mas extensa, y es la que vemos normalmente en google debajo del link al sitio, contando de que se trata el mismo. Es por eso que esta es una herramienta de captacion muy importante y debe ser muy explicita.</h3>
					<div class="col-md-12">
							@foreach ($description as $desc)
								@php
									$descript=$desc->description;
								@endphp
							@endforeach
							
							<textarea rows="3" name="description" style="width: 100%;" required>@if (isset($descript)){{ $descript }}@endif</textarea>
							
						
					</div>
				</form>
				<div class="clearfix"> </div>

			</div>
		</div>
</div>	
@endsection