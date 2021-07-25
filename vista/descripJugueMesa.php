<?php 

	session_start();

	if(!isset($_SESSION["usuario"])){
		header("Location:inicioClien.php");
	}

	require_once '../controlador/MarcaCtrl.php';
	require_once '../modelo/Marca.php';

	require_once '../controlador/CategoriaCtrl.php';
	require_once '../modelo/Categoria.php';

	require_once '../controlador/JugueteCtrl.php';
	require_once '../modelo/Juguete.php';

	$jug=new Juguete();
	$jug=buscarJuguete($_GET['id_Juguete']);
	
?>


<!DOCTYPE html>
 <html class="no-js"> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ToyNet</title>
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

	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/funciones.js"></script>

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.html">ToyNet</a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="index.html">Inicio</a>
								</li>
								<li>
									<a class="fh5co-sub-ddown">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="marca.html">Marca</a></li>
										<li><a href="categoria.html">Clasificacion</a></li>
										
									</ul>
								</li>
								<li><a>Mesa de regalos</a>
								 <ul class="fh5co-sub-menu">
									 	<!--<li><a href="mesaRegalos.html">Crear</a></li>-->
										<li><a href="mesa.php">Consultar</a></li>
										
								</li>
								</ul>
								<li>
									<a href="../vista/cerrar_sesion.php" class="fh5co-sub-ddown">Cerrar Sesion</a>
									 
								</li>
								
							</ul>
						</nav>
						
					</div>
				</div>

			</header>
			
		</div>
		<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(../images/toys.png);">
				<div class="desc animate-box">
					<form name="RegistrarJugueMesa" action="../controlador/MesaCtrl.php" method="post">
						<input type="hidden" name="accion" value="RegistrarJugueMesa">
					<img src="/ToyNet/imagenes/<?php echo $jug->getImagen();?>" width="200" height="200" class="trin" />
					 <h3><?php echo $jug->getNombre_Juguete(); ?></h3>
				<a><?php  echo $jug->getDescripcion_Juguete(); ?></a>
				<br>
				<a href=""><?php echo '$'.$jug->getPrecio().' Mx'; ?></a>
				<br>
				<br>

				<input type="hidden" name="id_Juguete" id="id_Juguete" value="<?php echo $jug->getNombre_Juguete();?>">
				<!--<input type="hidden" name="id_Mesa" id="id_Mesa">-->
				<input type="hidden" name="id_Mesa" id="id_Mesa" value="<?php echo $_SESSION["usuario"]; ?>">
				<input type="hidden" name="estado" id="estado" value="ACTIVO">
				 <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg">Agregar</button>
            </div>

				</form>
				
				<!--<button class="btn btn-succes" onclick="add(<?php //echo $jug->getId_Juguete();?>
				,'add');">Agregar</button> -->

		<script type="text/javascript">
          function confirmation(){
            if(confirm('Esta seguro que desea Agregar?')){
              location.href='../vista/jugueteMesa.php'
            }
          }
        </script>
				 
    <br>
	<br>
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
							<p>Copyright 2018 <a href="inicioAdm.html" >ToyNet</a> All Rights Reserved.</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	

	</div>
	<!-- END fh5co-page -->

	</div>
	


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
	<script src="../js/funciones.js"></script>
	</body>
</html>


