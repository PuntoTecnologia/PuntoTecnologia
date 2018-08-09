<!--/sidebar-menu-->
<div class="sidebar-menu">
<header class="logo1">
<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
</header>
<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
<div class="menu">
		<ul id="menu" >
			<li>
				<a href="/CONFIGURACION">
					<i class="fa fa-cog"></i> 
						<span>Configuracion</span>
				</a>
			</li>
			<li id="menu-academico" >
				<a>
					<i class="fa fa-file-text-o"></i> 
						<span>Catalogo</span>
						<span class="fa fa-angle-right" style="float: right"></span>
				</a>
				<ul>
					<li>
						<a href="/CATALOGO">
							<i class="">P</i>
							<span>Productos</span>
						</a>
					</li>
					<li>
						<a href="/EDITAR-CATEGORIAS">
							<i class="">C</i>
							<span>Categorias</span>
						</a>
					</li>
					<li>
						<a href="/MARCAS">
							<i class="">M</i>
							<span>Marcas</span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a>
					<i class="fa fa-file-text"></i>
					<span>Administracion</span>
					<span class="fa fa-angle-right" style="float: right"></span>
				</a>
					<ul>
						<li>
							<a href="/CLIENTES">
								<i class="fa fa-info"></i>
								<span>Clientes</span>
							</a>
						</li>
						<li>
							<a href="/PROVEEDORES">
								<i class="fa fa-file-text"></i>
								<span>Proveedores</span>
							</a>
						</li>
						<li>
							<a href="/PLANES">
							<i class="lnr lnr-envelope"></i>
							<span>Planes</span>
							</a>
						</li>
						<li>
							<a href="/IVA">
								<i class="">%</i>
								<span>Cond.Iva</span>
							</a>
						</li>
						<li>
							<a href="/DOLAR">
								<i class="fa fa-dollar"></i>
								<span>Dolar</span>
							</a>
						</li>
					</ul>
			</li>
			
			<!--
			<li>
				<a href="/ESTADISTICAS">
				<i class="lnr lnr-chart-bars"></i> 
				<span>Estadisticas</span>
				</a>
			</li>
			-->        
			
			
			
			<li>
				<a href="/TALLER">
				<i class="lnr lnr-layers"></i>
				<span>Taller</span>
				</a>
			</li>
			
			<li>
				<a href="/">
					<i class="lnr lnr-book"></i>
					<span>Ir al Portal</span>
				</a>
			</li>
			
			<li>
			<a href="{{ route('logout') }}">
				<i class="glyphicon glyphicon-remove"></i>
				<span>Cerrar Sesion</span>
			<span class="fa fa-angle-right" style="float: right"></span>
			</a>
			</li>
	  </ul>
</div>
</div>
<div class="clearfix"></div>	
</div>
<script>
	var toggle = true;
				
	$(".sidebar-icon").click(function() {                
	  if (toggle)
	  {
		$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
		$("#menu span").css({"position":"absolute"});
	  }
	  else
	  {
		$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
		setTimeout(function() {
		  $("#menu span").css({"position":"relative"});
		}, 400);
	  }
					
					toggle = !toggle;
				});
	</script>