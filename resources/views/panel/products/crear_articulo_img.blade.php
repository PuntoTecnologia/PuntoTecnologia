@extends ('panel.layout.layout')
@section('script_add')
		<!-- jQuery File Upload Dependencies -->
		<script src="{{asset ('/panel/js/script.js') }}"></script>
		<script src="{{asset ('/panel/js/jquery.knob.js') }}"></script>
		<script src="{{asset ('/panel/js/jquery.ui.widget.js') }}"></script>
		<script src="{{asset ('/panel/js/jquery.iframe-transport.js')}}"></script>
		<script src="{{asset ('/panel/js/jquery.fileupload.js') }}"></script>
		<link href="{{asset ('/panel/css/style_upload.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
					<a href="CATALOGO">
						<button type="button" class="btn btn-primary" style="float: right;">Terminar</button>
					</a>
				</div>
					<form id="upload" method="post" action="/drop" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div id="drop">
								<a>SELECCIONAR FOTOS</a>
                                
								<input type="file" name="upl" multiple />
								<input type="text" name="id_producto" value="{{ $crear_articulo->id }}">
                        
							</div>
                                                        
							<ul>
							<!-- The file uploads will be shown here -->
							</ul>
					</form>
			</div>
		</div>
</div>
@endsection