@extends('layouts.web')
@section('title')
    {{ $product->titulo }}
@endsection
@section('script_add')
        <!-- Animate CSS -->
        <link href="{{asset ('/css/animate.css') }}" rel="stylesheet">
        <!-- Owl Carousel CSS -->
        <link href="{{asset ('/css/owl.carousel.css') }}" rel="stylesheet">

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
    @foreach ($my_site as $element)
    <meta name="title" content="{{ $element->title }}">
    @endforeach
@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-4 col-md-offset-3">
                <!--VISOR DE IMAGENES-->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($img_productos as $img)
                          @if ($img->producto_id == $product->id)
                            <li data-thumb="/uploads/{{ $img->producto_id }}/full_{{ $img->file_name }}">
                                <img src="/uploads/{{ $img->producto_id }}/full_{{ $img->file_name }}" />
                            </li>
                          @endif
                        @endforeach
                    </ul>
                </div>
                <!-- FlexSlider -->
                  <script defer src="/js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
                <!-- //FlexSlider -->
                </div>
                <!--/VISOR DE IMAGENES-->
            	<div class="product-shop col-md-5" style="min-height:610px;">
                	<div class="product-name">
                        <h1>{{ $product->titulo }}</h1>
                        @if ($product->tipo == 1)
                		<div class="new-icon" style="float: right;margin-right: 2em;"><span>nuevo</span></div>
                	@endif
                	@if ($product->tipo == 2)
                		<div class="sale-icon" style="float: right;margin-right: 2em;"><span>usado</span></div>
                	@endif
                    </div>
                    <div class="ratings">
                    	<span class="amount"><a href="#"></a></span>
        			</div>

                    <div class="box-container2"> 
                        <div class="price-box">
                            <p class="special-price"><p style="font-size: x-large;">Valor: </p>
                            <span id="product-price-1" class="price">${{ round(((($product->costo*$product->rent)/100)+$product->costo)*$dolar[0]->valor) }}-</span>
                            </p>
                   		</div>
                    </div>
                    <!--DIVISOR ENTRE DATOS-->
                    <div class="col-md-12" style="border-bottom: 1px solid #ccc;margin:0.5em 0em 0.5em 0em"></div>
                    <div class="short-description">
                        <div class="std">Marca: 
                        @foreach ($marcas as $marca)
                            @if ($product->id_marca == $marca->id)
                                {{ $marca->marca }}
                            @endif
                        @endforeach
                    </div>
                    </div>
                    <!--DIVISOR ENTRE DATOS-->
                    <div class="col-md-12" style="border-bottom: 1px solid #ccc;margin:0.5em 0em 0.5em 0em"></div>
                    <div class="short-description">
                        <div class="std">Codigo: ({{$product->codigo}})</div>
                    </div>
                    <!--DIVISOR ENTRE DATOS-->
                    <div class="col-md-12" style="border-bottom: 1px solid #ccc;margin:0.5em 0em 0.5em 0em"></div>
                    <div class="short-description">
                        <div class="std">Descripcion:<br> {{$product->descripcion}}</div>
                    </div>
                    <!--DIVISOR ENTRE DATOS-->
                    <div class="col-md-12" style="border-bottom: 1px solid #ccc;margin:0.5em 0em 0.5em 0em"></div>
                    <p class="availability in-stock">Stock: <span>Consultar</span>
                    
                    </p>
                    <a href="javascript: void(0);"onclick="window.open('http://www.facebook.com/sharer.php?u=http://puntotecnologia.com.ar/detalle/{{ $product->id }}','popup', 'toolbar=0, status=0, width=650, height=450');">
                    <img style="width: 30%;" src="/images/facebook.png" alt="Compartir en Facebook" style="margin-left: 10px" /></a>
                </div>
        <!--DIVISOR ENTRE DATOS-->
                    <div class="col-md-12" style="border-bottom: 1px solid #ccc;margin:0.5em 0em 0.5em 0em"></div>
                    <div style="color:#f00;" class="text-center">IMPORTANTE ! </div>
                    <p class="text-center">Los precios son Finales en pesos contado efectivo. Cambios de productos dentro de las 72 horas habiles SIN EXCEPCION. Todos los productos disponen de garantia escrita. Los productos se entregan en sus embalajes originales. Todas las compras estan sujetas a disponibilidad de stock. Los precios pueden variar sin previo aviso.</p>
        </div>
		</div>
	</div>
</div>
@endsection
@section('java_down')
        <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
        </script>
@endsection
@section('footer')
	@include ('elements.footer')
@endsection