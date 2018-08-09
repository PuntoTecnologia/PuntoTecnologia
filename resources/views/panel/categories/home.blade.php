@extends ('panel.layout.layout')
@section('content')

<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle" style="margin-bottom: 0em;">Panel 3.0 Pro || {{ Request::path() }}</h2>
				<div class="col-md-10">
					<p style="margin-bottom: 2em;">EDICION DE CATEGORIAS</p>
				</div>
				<p class="col-md-12">Ayuda: Las categorias conforman al menu principal del sitio. Aquellas categorias PADRE (al crearlas no se la ubica dentro de otra cartegoria) seran parte del menu principal, las sub-categorias en 2do nivel confoman los sectores de cada item del menu, y finalmente el 3er nivel es para ubicar un sector especifico de productos. (Ej: Computacion(1)->Equipos(2)->clones(3))</p>
				<div class="col-md-2">
					<a href="/CREAR-CATEGORIA">
						<button type="button" class="btn btn-primary">Crear Categoria</button>
					</a>
				</div>
				<table class="table table-hover table-dark">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">NOMBRE</th>
				      <th scope="col">ACTIVA</th>
				      <th scope="col"></th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
									
									


				    @foreach ($lista_categorias as $element)
					    	<tr>
							      <th class="col-md-2">{{ $element->id }}</th>
							      
							      <td class="col-md-8">PRINCIPAL -->
									@if ($element->padre ==0)   @else
													@foreach ($lista_categorias as $sub_categoria)
														@if ($sub_categoria->id == $element->padre)
															{{ $sub_categoria->nombre }}
														@endif 
													@endforeach-->
									@endif
									
									{{ $element->nombre }}
							      </td>
								  <th>
								  	@if ($element->active == 0)
								  		No
								    @else
								    	Si
								  	@endif
								  </th>
							      <td class="col-md-1">
							      	<form action="/EDITAR-CATEGORIA/{{ $element->id }}" method="post">
							      		{{ csrf_field() }}
							      		<input style="background: #868686 !important;" type="submit" class="btn btn-primary" value="Editar">
							      	</form>
							      </td>
							      <td class="col-md-1">
							      	<form action="/ELIMINAR-CATEGORIA/{{$element->id}}" method="post" name="eliminar-categoria">

								      	{{ method_field('DELETE') }}
								      	{{ csrf_field() }}
							      		<button type="button" class="btn btn-primary btn-delete">Eliminar</button>
							      	
							      	</form>
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
	<script>
		$('.btn-delete').on('click', function(e){
					if(confirm('Seguro deseas eliminar la categoria ? dado que si la eliminas, los aritulos contenidos deberan ser asignados nuevamente a otra categoria')){
						$(this).parents('form:first').submit();
					}
				})
		</script>
@endsection