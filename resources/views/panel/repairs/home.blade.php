@extends ('panel.layout.layout')
@section('title')
	SISTEMA DE GESTION DE TALLER (Ingrese Nueva orden de trabajo).
@endsection
@section('script_add')
	<link rel="stylesheet" href="/panel/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables-invert.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
			<div id="tabs" class="tabs">
				<div class="col-md-12 form-title" style="margin-bottom: 1em;">
					<h3 class="" style="margin-bottom: 0.5em;float:left;color: #fff;">Listado de Ordenes de Trabajo</h3>
					<a href="/CREAR-ORDEN" style="float: right;margin-top: 1em;">
						<button type="button" class="btn btn-primary">Ingresar Orden</button>
					</a>
				</div>
				
      <table id="tabla" class="display" cellspacing="0" width="100%">
        <thead>
		    <tr>
		      <th scope="col">Orden</th>
		      <th scope="col">Cliente Nombre</th>
		      <th scope="col">Salvar Datos?</th>
		      <th scope="col">Estado</th>
		      <th scope="col">Precio</th>
		      <th scope="col">Accion</th>
		    </tr>
		</thead>
 
 
        <tbody>
            @foreach ($lista_repairs as $element)
					    	<tr>
					    	
							      <td class="col-md-1">{{ $element->id }}</td>
							      <td class="col-md-5">
										{{ $element->last_name }} {{ $element->name }}
							      </td>
							      <td class="col-md-2">
							      @if ($element->datos == 1)
							      	Si
							      @else
							        No
							      @endif
							      </td>
							      <td class="col-md-2">
									@if ($element->estado == 1)
										<p style="color:#f00;">Ingresado</p>
									@endif
									@if ($element->estado == 2)
										<p style="color:#2d7370;">Presupuestado</p>
									@endif
									@if ($element->estado == 3)
										<p style="color:#0f0;">Aceptado</p>
									@endif
									@if ($element->estado == 4)
										<p>Entregado</p>	
									@endif
							      </td>
							      <td class="col-md-1">${{ $element->precio }}-</td>
							      <td class="col-md-1">
							      	<a href="/ejemplo/{{ $element->id }}" target="_blank"><img src="/images/print.png" width="40%"></a>
							      	<a href="/DETALLE-ORDEN/{{ $element->id }}">
							      		<img src="/images/ing.png" width="40%">
							      	</a>
							      </td>
						    </tr>
				    @endforeach
				    
        </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
@endsection