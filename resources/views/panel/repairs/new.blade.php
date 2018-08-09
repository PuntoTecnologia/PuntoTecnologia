@extends ('panel.layout.layout')
@section('title')
	SISTEMA DE GESTION DE TALLER (Ingrese Nueva orden de trabajo).
@endsection
@section('script_add')
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="/panel/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/panel/js/jquery.dataTables.min.js"></script>
	<script src="/panel/js/table.js"></script>
@endsection
@section('content')
<div class="tab-main">
			<div id="tabs" class="tabs">
				<div class="col-md-12 form-title" style="margin-bottom: 1em;">
					<h3 class="" style="margin-bottom: 0.5em;float:right;color: #fff;">Nueva Orden de Trabajo</h3>
				</div>
				<form method="post" action="/GRABAR-ORDEN">
				{{ csrf_field() }}
				<div class="col-md-12">
					<h2>Datos Cliente</h2>
				</div>
				<div class="col-md-2">
					<a href="#clients" style="background: #868686 !important;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						<img src="/images/icocli.png" style=" width: 100%;">
					</a>
				</div>
				<!-- SI $id NO ESTA VACIA, ENTONCES RECORRO Y OBTENGO CLIENTE -->
				
				<div class="col-md-5">
					<label>Nombre</label>
					<input class="form-control" type="text" name="name" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-5">
					<label>Apellido</label>
					<input class="form-control" type="text" name="last_name" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-2">
					<label>Cuit - Cuil - Dni</label>
					<input class="form-control" type="text" name="cuit_cuil" style="width: 100%;" required readonly>
				</div>
				<!-- //////////////////////////////////////////////  -->
				<div class="col-md-4">
					<label>Telefono</label>
					<input class="form-control" type="text" name="telefono" style="width: 100%;" required readonly>
				</div>
				<div class="col-md-4">
					<label>Correo Electronico</label>
					<input 	class="form-control" type="text" name="id" style="width: 100%;" required readonly>
				</div>
				<!-- //////////////////////////////////////////////  -->
				<div class="col-md-12">
					<h2>Datos Equipo</h2>
				</div>
				<div class="col-md-8">
				<label>Marca / Modelo</label>
					<input class="form-control" type="text" name="marca_modelo" style="width: 100%;" required>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<label style="margin-bottom: 0.5em;">Salvar datos</label>
					si <input type="radio" name="datos" value="1" required>
					no <input type="radio" name="datos" value="0">
				</div>
				
				<div class="col-md-12" style="margin-top:1em;">
					<label>Problema / Trabajo a realizar</label>
					<textarea name="descripcion" rows="4" style="width:100%;" required></textarea>
				</div>
				<div class="col-md-12 form-title" style="margin-bottom: 1em;">
					
				</div>
				</form>
			</div>
		</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding: 0.5em 1.5em 0.5em 1.5em;">
      <table id="tabla" class="display" cellspacing="0" width="100%">
        <thead>
		    <tr>
		      <th scope="col">CLIENTE</th>
		      <th scope="col">E-MAIL</th>
		      <th scope="col">TELEFONO</th>
		      <th scope="col">CUIT-CUIL</th>
		      <th scope="col">ALTA</th>
		      <th scope="col"></th>
		    </tr>
		</thead>
 
 
        <tbody>
            @foreach ($lista_clients as $element)
					    	<tr>
							      <td class="col-md-2">{{ $element->last_name }} {{ $element->name }}</td>
							      <td class="col-md-1">{{ $element->email }}</td>
							      <td class="col-md-2">{{ $element->telefono }}</td>
							      <td class="col-md-1">{{ $element->cuit_cuil }}</td>
							      <td class="col-md-4">{{ $element->created_at }}</td>
							      <td class="col-md-1">
							      	<a href="/TALLER/{{ $element->id }}">
							      		<img src="/images/accept.png" style="width: 1.6em;">
							      	</a>
							      </td>
						    </tr>
				    @endforeach
        </tbody>
    </table>
    </div>
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