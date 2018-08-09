@extends('layouts.web')
@section('title')
@foreach ($my_site as $element)
{{ $element->title }}
@endforeach
@endsection
@section('metakeys')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@foreach ($my_site as $element)
<meta name="title" content="{{ $element->title }}">
@endforeach
@foreach ($meta_description as $desc)
<meta name="description" content="{{ $desc->description }}">
@endforeach
@foreach ($metakeys as $keys)
<meta name="keywords" content="{{ $keys->key1 }}, {{ $keys->key2 }}, {{ $keys->key3 }}, {{ $keys->key4 }}, {{ $keys->key5 }}, {{ $keys->key6 }}, {{ $keys->key7 }}, {{ $keys->key8 }}" />
@endforeach
@endsection
@section('content')
<div class="newproductslider-container"> 
        <div id="new-products" class="owl-container">
        <!-- COLUMNA EN BLANCO PARA NO QUEDAR BAJO EL MENU -->
		<div class="col-md-3 visible-md visible-lg" style="min-height: 455px;"></div>
		<!-- // COLUMNA EN BLANCO PARA NO QUEDAR BAJO EL MENU -->
         <div class="col-md-9">
			<!-- FOREACH DE PRODUCTOS -->
			@foreach ($productos as $producto)
			<a href="/detalle/{{ $producto->producto_id }}">
				<div>
					<div class="col-md-4" style="padding: 0.5em; border:1px solid #ccc;">
				        <div class="item-inner">
				            <div class="images-container">
				                <div class="product_icon">
				                	@if ($producto->tipo == 1)
				                		<div class="new-icon"><span>nuevo</span></div>
				                	@endif
				                	@if ($producto->tipo == 2)
				                		<div class="sale-icon"><span>usado</span></div>
				                	@endif
				                    
				                </div>
				                <a href="/detalle/{{ $producto->producto_id }}" class="product-image">
				                	<img src="/uploads/{{ $producto->producto_id }}/min_{{ $producto->file_name }}" alt="Nunc facilisis">
				                </a>
				            </div>
				            <div class="des-container">
				                <h2 class="product-name"><a href="/detalle/{{ $producto->producto_id }}">{{ substr($producto->titulo, 0, 30) }}</a></h2>
				                <div class="price-box">
				                    <a href="/detalle/{{ $producto->producto_id }}">
					                    <p class="special-price">
					                        <!--CALCULO DEL PRECIO DE VENTA-->
					                        <span class="price">${{ round(((($producto->costo*$producto->rent)/100)+$producto->costo)*$dolar[0]->valor) }}-</span>
					                    </p>
				                    
					                    <p class="old-price">
					                    	<span class="price-label"></span>
					                        <span style="float: right;">cod.({{ $producto->codigo }})</span>
					                    </p>
					                </a>
				                </div>
				                <div class="ratings">
				                    <div class="rating-box">
				                        <div class="rating" style="width:67%"></div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- FOREACH DE PRODUCTOS -->
				</a>
				@endforeach
            </div>
		</div>
	</div>
</div>
@endsection
@section('footer')
	@include ('elements.footer')
@endsection
