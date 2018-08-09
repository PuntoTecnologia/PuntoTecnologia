@extends ('panel.layout.layout')
@section('content')
@section('title')
	Estas editando la categoria {{ $categori->nombre }}
@endsection
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-12">
					<p style="margin-bottom: 2em;">Estas por editar la categoria. {{ $categori->nombre }}</p>
				</div>
				<form method="post" action="/EDITAR-CATEGORIA/{{ $categori->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
					<div class="col-md-4">
						<input type="text" name="nombre" value="{{ $categori->nombre }}">
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<label">Activa || 
					    	Si <input name="active" value="1" type="radio" @if ($categori->active=='1')
					    		checked @endif>
							No <input name="active" value="0" type="radio" @if ($categori->active=='0')
					    		checked @endif>
					    </label>
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary">Editar</button>
					</div>
				</form>			
			</div>
		</div>
</div>
@endsection