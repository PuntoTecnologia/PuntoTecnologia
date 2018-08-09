@extends ('panel.layout.layout')
@section('title')
	Panel 3.0 || Gestion en linea || By  Promedios
@endsection
@section('content')
<div class="tab-main">
	<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">Panel 3.0 Pro || {{ Request::path() }}</h2>
					<div class="graph">
						<div class="content tab">
							<section id="section-1" class="content-current">
								<div class="mediabox">
									<i class="fa fa-shopping-cart"></i>
									<h3>Tienda Auto Admin</h3>
									<p>Por medio de nuestro nuevo panel de administracion, podras gestionar todos tus articulos de forma rapida y sencilla.</p>
								</div>
								<div class="mediabox">
									<i class="fa fa-sitemap"></i>
									<h3>Inter conect</h3>
									<p>Nuestra plataforma en linea brinda mayor conectividad entre sitios, velocidad y soporte.</p>
								</div>
								<div class="mediabox">
									<i class="fa fa-unlock"></i>
									<h3>Seguridad 100%</h3>
									<p>Un robusto sistema basado en diferentes lenguajes de programacion, brinda seguridad total a tu informacion.</p>
								</div>
									</section>
										
						</div><!-- /content -->
					</div>
				<!-- /tabs -->
			</div>
		</div>
</div>
@endsection