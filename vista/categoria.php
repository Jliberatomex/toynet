<?php
	/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista  Categoria
   */
	session_start();

	if(!isset($_SESSION["administrador"])){
		header("Location:inicioAdm.php");
	}

	require_once '../controlador/CategoriaCtrl.php';
	require_once '../modelo/Categoria.php';

	

	$miscategorias=obtenerCategoria();
?>

<!DOCTYPE html>

 <html class="no-js"> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toynet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />

  
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="shortcut icon" href="../images/toy.png">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="../css/superfish.css">

	<link rel="stylesheet" href="../css/styless.css">
<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
	</head>
	<body>
	<div data-stellar-background-ratio="0.5" style="background-image: url(../images/play.jpg);">
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="../vista/vistaAdm.php">ToyNet</a></h1>&nbsp;&nbsp;<img src="../images/toy.png" width="38" style="margin-top:15px;"  >
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="../vista/vistaAdm.php">Inicio</a>
								</li>
								<li>
									<a class="fh5co-sub-ddown">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marca.php">Marcas</a></li>
										<li><a href="../vista/categoria.php">Categorias</a></li>
										<li><a href="../vista/juguete.php">Gestion</a></li>
										
									</ul>
								
							

								<li>
									<a href="../vista/cerrar_sesion.php" class="fh5co-sub-ddown">Cerrar Sesion</a>
								</li>
								<!--<li>
									<a href="inicio.html" class="fh5co-sub-ddown">Inicio Sesion</a>
									 <ul class="fh5co-sub-menu">
									 	<li><a href="registro.html">Registrarse</a></li>
										
									</ul>
								</li>-->
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<br>
		<br>
		<br>
		<br>
	<h1>Categorias<h1>	
		<br>
		<br>
		<br>
		<br>
		
		<div class="fh5co-listing">
			<div class="container-table100">
				<div class="table100 ver2 m-b-310" style="">
					<table id="0" data-vertable="ver2">
						<thead>
							<tr class="row100 head">
								
								<th  class="column100 column1" data-column="column1">Nombre de la Categoria</th>
								<th class="column100 column2" data-column="column2">Descripcion</th>
								<th class="column100 column3" data-column="column3">Imagen</th> 
								<th class="column100 column3" data-column="column3">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($miscategorias as $c){  ?>
								
								<tr>
									
									<td ><?php echo $c->getNombre_Categoria(); ?></td>
									<td><?php echo $c->getDescripcion_Categoria(); ?></td>
									<?php	$imag= $c->getImagen(); ?>
									<td><img class="img-responsive" width="350px" height="450px" src="/ToyNet/imagenes/<?php echo $c->getImagen();?>"></td>
								<td><a   href="../vista/ActCate.php?id_Categoria= <?php echo $c->getId_Categoria();   ?>"><img src="../images/modificar.png" width="35px" height="35px"> </a>
									<a   href="../vista/EliCate.php?id_Categoria= <?php echo $c->getId_Categoria();   ?>">&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/eliminar.png" width="35px" height="35px"></a>
									</td>
									
								</tr>
								<?php } ?>
							
						</tbody>
					</table>
					<br>
					<a href="../vista/RegistrarCate.php"/><button type="button" class="btn btn-success">Agregar Categoria</button>
				</div>

				<script type="text/javascript">
					function confirmation(){
						if(confirm('Esta seguro que desea eliminar?')){
							location.href='../controlador/MarcaCtrl.php?accion=EliminarMar&idMarca=<?php $m->getIdMarca();?>'
						}
					}
				</script>


				
			</div>



		<footer>
			 <div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2018 ToyNet All Rights Reserved.</a></p>
						</div>
					</div>
				</div>
			  </div>
		</footer>
	

	
	<script type="text/javascript">
		$(document).on('click','a.confirmDelete',function(e)){
			e.preventDefault();
			var linkURL=$(this).attr("href");
			warnBeforeRedirect(linkURL);
		};

		function warnBeforeRedirect(linkURL){
			swal({
				title:"Desea Borrar este registro?",
				type: "Warning",
				showCancelButton:true,

			}).then(function(result){
				console.log(result);
				if(result.value){
					window.location.href=linkURL;
				}
			});
		}

	</script>
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="../js/hoverIntent.js"></script>
	<script src="../js/superfish.js"></script>
	<!-- Main JS -->
	<script src="../js/main.js"></script>
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="../js/hoverIntent.js"></script>
	<script src="../js/superfish.js"></script>

	<!-- Main JS -->
	<script src="../js/main.js"></script>

	</body>
</html>

