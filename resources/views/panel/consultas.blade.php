@extends('panel.layout.layout')
@section('title')
	Consultas recibidas en tu sitio.
@endsection
@section('content')
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0.5em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<p style="margin-bottom: 1em;">Consultas de clientes orden temporal decreciente:</p>

				@foreach ($consultas as $con)
					<div class="women_main col-md-12">
					<div class="women_main col-md-12" style="margin-bottom: 1em;">
						{{ $con->created_at }}
					</div>
					<h4>{{ $con->nombre}}</h4>
					<p>{{ $con->telefono }}</p>
					<p>{{ $con->email }}</p>
					<p>{{ $con->consulta }}</p>
				</div>
				@endforeach
				
					
			</div>
		</div>
</div>
@endsection