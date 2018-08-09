<div class="header">          
<div class="topbar visible-lg visible-md">
        <div class="container">
            <div class="topbar-left">
                <ul class="topbar-nav clearfix">
                    <li><span class="phone">(0223) 474 9790</span></li>
                    <li><span class="email">info@puntotecnologia.com.ar</span></li>
                </ul>
            </div>
            <div class="topbar-right">
                <ul class="topbar-nav clearfix">
                @guest
                    <li><a href="/login" class="login">Login</a></li>
                @else
                <li><a href="/ACCESO">
                <i class="fa fa-cog"></i> Panel 3.0</a></li>
                <li><a href="/logout" class="login">Salir</a></li>
                @endguest

                </ul>
            </div>
        </div><!-- /.container -->
    </div><!-- /.topbar -->
    
    <div class="header-bottom">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-3">
                	<a href="/" class="logo visible-lg visible-md"><img src="/images/logo.png" alt=""></a>
                </div>
                <div class="col-md-9">
                	<div class="support-client">
                    	<div class="row">
                        	<div class="col-sm-4 visible-lg visible-md">
                            	<div class="box-container time">
                                    <div class="box-inner">
                                    	<h2>Horario On-line</h2>
                                    	<p style="font-size: smaller;">Lun- Sab: 09:00 a 13:00 - 16:00 a 20:00</p>
                                    </div>
                           		</div>
                            </div>
                            <div class="col-sm-4 visible-lg visible-md">
                            	<div class="box-container free-shipping">
                                    <div class="box-inner">
                                        <h2>Envio Grátis</h2>
                                        <p>Consultar zonas</p>
                                    </div>
                            	</div>
                            </div>
                            <div class="col-sm-4 visible-lg visible-md">
                            	<div class="box-container money-back">
                                    <div class="box-inner">
                                        <h2>Pago Seguro</h2>
                                        <p>Efectivo y Tarjetas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.support-client -->
                    <form class="form-search" action="/catalogo/busqueda" method="get">
                    	<input type="text" class="input-text" name="busqueda" placeholder="Buscar Producto..." onfocus="onfocus">
                        <div class="dropdown">
                            <!-- MENU DESPLEGABLE DE CATEGORIAS EN BUSCADOR HEADER -->
                          	<button type="button" class="btn" data-toggle="dropdown">Categorias <span class="fa fa-angle-down"></span></button>
                          	<ul class="dropdown-menu dropdown-menu-right">
                                @foreach ($categorias as $cat_search)
                                  @if ($cat_search->padre == 0)
                                        <li><a href="/catalogo/cat/{{ $cat_search->id }}">{{ $cat_search->nombre }}</a></li>
                                    @endif  
                                @endforeach
                          	</ul>
                        </div>
                        <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                    </form>
                    
                </div>
            </div>
<div class="row">
       	<div class="col-md-3">
              	<div class="mega-container hidden-sm hidden-xs">
                        <div class="navleft-container">
                            <div class="mega-menu-title"><h3>Categorias</h3></div>
<!-- ESTE ES EL MENU DE CATEGORIAS PRINCIPAL -->
<div class="mega-menu-category">
	<ul class="nav hidden-sm hidden-md">
    <!--RECORRO CATEGORIAS-->
    	@foreach ($categorias as $cat)
        <!--MUESTRO PRINCIPALES-->
        @if ($cat->padre == 0)
        <li>
                <a href="/catalogo/cat/{{ $cat->id }}">{{ $cat->nombre }}</a>
        
        <!--RECCORRO CATEGORIAS-->
        @foreach ($categorias as $sub)
            <!--MUESTRO ID PADRE CORRESPONDIENTE-->
            @if ($sub->padre == $cat->id)
                <div class="wrap-popup column3" style="width: max-content;">
                    <div class="popup">
                        <div class="row">
                                <!-- SI LA SUB CATEGORIA CONTIENE UN TERCER NIVEL GRABO VAR $NIVELES -->
                                @php
                                    $niveles=0;
                                @endphp
                                @foreach ($categorias as $niv)
                                    @if ($niv->padre == $cat->id)
                                        @foreach ($categorias as $niv3)
                                            @if ($niv3->padre == $niv->id)
                                                @php
                                                    $niveles='3';
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <!-- SI EL FORMATO DEBE SER DE 3 NIVELES -->
                                @if ($niveles=='3')
                                    @foreach ($categorias as $nivel3)
                                        @if ($nivel3->padre == $cat->id)
                                            <div class="col-md-4">
                                                    <h3 style="margin-top: 1em;border-bottom: 1px solid #ccc;"><a href="/catalogo/subcat_2/{{ $nivel3->id }}">{{ $nivel3->nombre }}</a></h3>
                                                <ul class="nav">
                                                    @foreach ($categorias as $nivel4)
                                                        @if ($nivel4->padre == $nivel3->id)
                                                            <li><a href="/catalogo/subcat2/{{ $nivel4->id }}">{{ $nivel4->nombre }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    @endforeach
                                <!-- SI NO TIENE 3ER NIVEL LO MUESTRO EN FORMATO DE 2 NIVELES -->
                                @else
                                <div class="col-md-12">
                                    <h3 style="margin-top: 1em;border-bottom: 1px solid #ccc;">
                                        <a href="/catalogo/cat/{{ $cat->id }}">{{ $cat->nombre }}</a></h3>
                                    <ul class="nav">
                                        @foreach ($categorias as $nivel2)
                                            @if ($nivel2->padre == $cat->id)
                                                <li><a href="/catalogo/subcat/{{ $nivel2->id }}">{{ $nivel2->nombre }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        </li>
        @endif
        @endforeach
    </ul>
</div>

</div>
</div>
</div>
    <!-- ESTE ES EL MENU TOP CATEGORIAS -->
    <div class="col-md-9 visible-lg visible-md-block hidden-sm ">
    	<ul class="menu clearfix ">
        <!-- FAMILIAS -->
            <li><a href="/">Home</a></li>
        	<li><a href="/destacados/">Productos  Destacados</a></li>
        	<li><a href="/ultimos/ingresos">Ultimos Ingresos</a></li>
        	<li><a href="/ofertas">Ofertas</a></li>
        	<li><a href="/catalogo/cat/7">Insumos</a></li>
            <li><a href="/catalogo/cat/17">Repuestos</a></li>
        </ul>
    </div>
</div>
</div>
        <!-- ESTE ES EL MENU COLAPSADO PARA CELULARES -->
        <nav class="navbar navbar-primary navbar-static-top ">
          	<div class="container hidden-lg hidden-md visible-sm-block visible-xs-block">
            	<div class="navbar-header">
              		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
              		</button>
                    <h2 class="navbar-brand">Menu</h2>
            	</div>
            	
                <div class="collapse navbar-collapse">
              		<ul class="navbar navbar-nav">
                        @foreach ($categorias as $niv1)

                            <!--NIVEL 1-->
                            @if ($niv1->padre == 0)
                                <li class="dropdown">
                                  <a href="/catalogo/cat/{{ $niv1->id }}"  data-toggle="dropdown">{{ $niv1->nombre}} <span class="fa fa-angle-down"></span>
                                  </a>
                                <!--NIVEL 2-->
                                @foreach ($categorias as $niv2)
                                    @if ($niv1->id == $niv2->padre)
                                            <ul class="dropdown-menu">
                                               <li><a href="/catalogo/cat/{{ $niv2->id }}">{{ $niv2->nombre }}</a></li>
                                            </ul>
                                    @elseif ($niv1->id == $niv2->id)
                                        <ul class="dropdown-menu">
                                           <li><a href="/catalogo/cat/{{ $niv2->id }}">{{ $niv2->nombre }}</a></li>
                                        </ul>
                                    @endif
                                @endforeach
                            </li>
                            @endif
                        @endforeach
                    	
              		</ul>
            	</div><!-- /.navbar-collapse -->
          	</div><!-- /.container -->
        </nav>
    </div><!-- /.header-bottom -->
</div><!-- /.header -->