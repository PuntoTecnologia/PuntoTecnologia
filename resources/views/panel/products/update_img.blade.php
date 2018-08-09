@extends ('panel.layout.layout')
@section('script_add')
		<!-- jQuery File Upload Dependencies -->
		<script src="{{asset ('panel/js/script.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.knob.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.ui.widget.js') }}"></script>
		<script src="{{asset ('panel/js/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset ('panel/js/jquery.fileupload.js') }}"></script>
		<link href="{{asset ('panel/css/style_upload.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
				<a href="/CATALOGO">
					<button style="float: right;font-size: 25px;" class="btn btn-primary">Terminar Edicion</button>
					</a>
				</div>

				<div class="contenedor-fotos col-md-12" style="margin:2em 2em 2em 2em;">
					@foreach ($images as $producto)
						<div class="grid1_of_4">
							<div class="content_box">
								<form action="/ELIMINAR-FOTO/{{ $producto->id }}/{{ $producto->producto_id }}/{{ $product->id }}" method="post" name="eliminar-categoria">
								      	{{ csrf_field() }}
								      	<button type="submit">
							      		<img src="/images/delete.png" style="width: 10%;float: right;">
							      		</button>
							      	</form>
								<img src="/uploads/{{ $producto->producto_id }}/min_{{ $producto->file_name }}" class="img-responsive" alt="" style="margin-top: 5%;">
							</div>
						</div>
					@endforeach
				</div>


					<form id="upload" method="post" action="/drop" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div id="drop">
								<a>AGREGAR NUEVAS FOTOS</a>


                                
								<input type="file" name="upl" multiple />
								<input type="text" name="id_producto" value="{{ $product->id }}">
                        
							</div>
                                                        
							<ul>
							<!-- The file uploads will be shown here -->
							</ul>
					</form>
			</div>
		</div>
</div>
@endsection