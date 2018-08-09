<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.contenedor_orden{
			border:1px solid #ccc;
			border-radius: 3px 3px 3px 3px;
			padding: 3mm 3mm 3mm 3mm; 
		}
		.cabezera{
			width: 100%;
			display: inline-block;
		}
		.cab-text{
			float: right;
			margin: 0;
			margin-top: 5mm;
		}
		.linea1{
		}
		.separador{
			width: 100%;
			border-bottom: 1px solid #ccc;
		}
		.troquelado{
			margin-top: 3mm;
		}
	</style>
</head>
<body>
<div class="contenedor_orden">
	<div class="cabezera">
		<img src="images/logo.png" style="width: 40%;">
		<h2 class="cab-text">Ingreso: <?php echo date("j/n/Y");?></h2>
	</div>
	<div class="separador"></div>
	<div style="float: right;">Orden de trabajo: {{ $repair2[0]->id }}</div>
	<div class="linea_1">
		
		<table>
		<tr>
			<th><h2>Datos del Cliente</h2></th>
			<th><h2>Datos del Equipo</h2></th>
		</tr>
		<tr>
			<td style="padding:2mm;">
				
				<div>Cliente: {{ $repair2[0]->name }} {{ $repair2[0]->last_name }}</div>
				<div>Cuit / Cuil: {{ $repair2[0]->cuit_cuil }} </div>
				<div>Telefono: {{ $repair2[0]->telefono }} </div>
				<div>E-mail: {{ $repair2[0]->email }} </div>
			</td>
			<td>
				
				<div>Marca/Modelo: {{ $repair2[0]->marca_modelo }} </div>
				<div>Salvar datos: @if ($repair2[0]->datos == 1)
					Si
				@else
					No
				@endif </div>
				<div>Problema / Trabajo a realizar </div>
				<div style="font-weight: bold;">{{ $repair2[0]->descripcion }} </div>
			</td>
		<div class="separador"></div>
		
		</tr>
		</table>
	</div>
	<p style="font-size: 12px;">Por medio del presente, el comercio NO se hace responzable por el contenido del software pre instalado en este equipo, ya que desconocemos su procedencia previa, siendo la propiedad de los programas y documentos almacenados en disco rigido y otros dispositivos de almacenamiento responsabilidad de: <br>(Datos del cliente al comienzo de la orden)</p>
	<p>En cumplimiento con las normas vigentes se declara responzable de la tenencia de la mercaderia que entrego para reparacion, deslindando a esta empresa de cualquier responzabilidad por dicha tenencia u origen. Dejamos constancia que las condiciones generales de trabajo, de no retirar el equipamiento dentro de los 90 (noventa) dias a partir de la fecha</p>
	
</div>
<div class="troquelado"></div>
<div class="contenedor_orden">
	<div class="cabezera">
		<img src="images/logo.png" style="width: 40%;">
		<h2 class="cab-text">Ingreso: <?php echo date("j/n/Y");?></h2>
	</div>
	<div class="separador"></div>
	<div style="float: right;">Orden de trabajo: {{ $repair2[0]->id }}</div>
	<div class="linea_1">
		
		<table>
		<tr>
			<th><h2>Datos del Cliente</h2></th>
			<th><h2>Datos del Equipo</h2></th>
		</tr>
		<tr>
			<td style="padding:2mm;">
				
				<div>Cliente: {{ $repair2[0]->name }} {{ $repair2[0]->last_name }}</div>
				<div>Cuit / Cuil: {{ $repair2[0]->cuit_cuil }} </div>
				<div>Telefono: {{ $repair2[0]->telefono }} </div>
				<div>E-mail: {{ $repair2[0]->email }} </div>
			</td>
			<td>
				
				<div>Marca/Modelo: {{ $repair2[0]->marca_modelo }} </div>
				<div>Salvar datos: @if ($repair2[0]->datos == 1)
					Si
				@else
					No
				@endif </div>
				<div>Problema / Trabajo a realizar </div>
				<div style="font-weight: bold;">{{ $repair2[0]->descripcion }} </div>
			</td>
		<div class="separador"></div>
		
		</tr>
		</table>
	</div>
	<p style="font-size: 12px;">Este es el espacio en donde se coloca el texto de legales de la reparacion, en donde dice que el cliente no pede abandonar el equipo, que tiene que firmarlo para que la empresa no tenga problemas con el software y un monton de cosas mas que mas o menos tienen el largo de este texto, solamente que contiene otras palabras bastante mas utiles pero tengo que escribir algo para que la orden tenga todo lo que tiene que tener,</p>
	
</div>
</body>
</html>