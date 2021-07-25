<?php

	session_start();

	if(!isset($_SESSION["usuario"])){
		header("Location:inicioClien.php");
	}



	require_once '../controlador/JugueteCtrl.php';
	require_once '../modelo/Juguete.php';

	require_once '../controlador/MarcaCtrl.php';
	require_once '../modelo/Marca.php';


	require_once '../controlador/CategoriaCtrl.php';
	require_once '../modelo/Categoria.php';

	require_once '../modelo/Mesa.php';
	require_once '../controlador/MesaCtrl.php';


	$misjugue=obtenerJugue();
	$mesa = new Mesa();
	//$_REQUEST['id_usuario'];

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toynet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles.css">
	
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="shortcut icon" href="../images/toy.png">
	  
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
	<link rel="shortcut icon" href="../favicon.ico">
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
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
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
	<link rel="stylesheet" type="text/css" href="../css/styless.css">
	
<!--===============================================================================================-->
</head>
<body>
	<div data-stellar-background-ratio="0.5" style="background-image: url(../images/trinity.jpg);">
        <div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
		<br>
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="../vista/vistaClien.php">ToyNet</a></h1>&nbsp;&nbsp;<img src="../images/toy.png" width="38" style="margin-top:15px;"  >
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="../vista/vistaClien.php">Inicio</a>
								</li>
								<li>
									<a class="fh5co-sub-ddown" href="../vista/jugueteVisitante.php">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marVisitante.php">Marcas</a></li>
										<li><a href="../vista/cateVisitante.php">Categorias</a></li>
										
										
									</ul>
								</li>
								<li><a>Mesa de regalos</a>
								 <ul class="fh5co-sub-menu">
									 	<li><a href="../vista/consuMesa.php">Consultar</a></li>
										<li><a href="../vista/mesa.php">Ver mi mesa</a></li>
										
								</li>
								</ul>
								<li><a href="../vista/cerrar_sesion.php">Cerrar Sesion</a>

								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<br>
			<br>
			<br>
			<h1>Juguetes</h1>
			<br>
			<br>
			<br>
			<br>
			<br>

			<div class="fh5co-listing">
				<div class="container-table100">
					<div class="row">
						<br>

						<br>
						<br>
						
						
							<?php foreach($misjugue as $j ) { ?>
							<div class="col-md-4 col-sm-4 fh5co-item-wrap">
								<a class="fh5co-listing-item" href="../vista/descripJugueMesa.php?id_Juguete=<?php echo $j->getid_Juguete(); ?>&&?id_usuario=<?php echo $_SESSION["usuario"] ?>">
									<img src="/ToyNet/imagenes/<?php echo $j->getImagen(); ?>" class="img-responsive">
										<div class="fh5co-listing-copy">
											<h1 style="text-align: left;font-size:25px;"><?php echo $j->getNombre_Juguete(); ?></h1>&nbsp;
												<span class="icon">
													<i class="icon-chevron-right"></i>
													
												</span>
										</div>
									</a>
								</div>
										
							<?php } ?>
						</div>	
		</div>
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
	

<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>