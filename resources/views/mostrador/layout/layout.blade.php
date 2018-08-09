
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>@yield ('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="/mostrador/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="/mostrador/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="/mostrador/css/font.css" type="text/css"/>
<link href="/mostrador/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="/mostrador/js/jquery2.0.3.min.js"></script>
<script src="/mostrador/js/modernizr.js"></script>
<script src="/mostrador/js/jquery.cookie.js"></script>
<script src="/mostrador/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- charts -->
<script src="/mostrador/js/raphael-min.js"></script>
<script src="/mostrador/js/morris.js"></script>
<link rel="stylesheet" href="/mostrador/css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="/mostrador/js/skycons.js"></script>
<!--//skycons-icons-->
@yield('script_header')
</head>
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
	<nav class="main-menu">
		<ul>
			<li class="has-subnav">
				<a href="/mostrador/punto_venta">
				<i class="iconos">V</i>
				<span class="nav-text">
				Vender
				</span>
				</a>
			</li>
			
			<li>
				<a href="charts.html">
					<i class="fa fa-bar-chart nav_icon"></i>
					<span class="nav-text">
						Consultar Ventas
					</span>
				</a>
			</li>

			<li class="has-subnav">
				<a href="/mostrador/punto_compra">
				<i class="iconos">C</i>
				<span class="nav-text">
				Comprar
				</span>
				</a>
			</li>
			
		</ul>
		<ul class="logout">
			<li class="has-subnav">
				<a href="/ACCESO">
				<i class="fa fa-cogs" aria-hidden="true"></i>
				<span class="nav-text">
					Administracion
				</span>
				</a>
			</li>

			<li>
			<a href="{{ route('logout') }}">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Salir
			</span>
			</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu" style="background:#fff;">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar col-md-4 col-md-offset-8" style="display: flex;">
			<h1><a href="index.html">Panel de Ventas</a></h1>
			<div class="full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>	
				</section>
			</div>
		</section>
		<div class="main-grid" style="height: 85%;">
			@yield ('content')
		</div>
		
		<!-- footer -->
		<div class="footer">
			<p>© CopyRight 2018. Todos los Derechos Reservados . Design by <a href="http://www.puntotecnologia.com.ar">PuntoTecnologia</a></p>
		</div>
		<!-- //footer -->
	</section>
	<script src="/mostrador/js/bootstrap.js"></script>
	<script src="/mostrador/js/proton.js"></script>
</body>
</html>
