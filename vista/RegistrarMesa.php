<?php 

/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista Registrar Mesa
   */
session_start();

	if(!isset($_SESSION["usuario"])){
		header("Location:inicioClien.php");
	}

require_once '../modelo/Mesa.php';
require_once '../controlador/MesaCtrl.php';

require_once '../modelo/Usuario.php';
require_once '../controlador/UsuarioCtrl.php';



$usua= new Usuario();


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toynet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="shortcut icon" href="images/toy.png">
	  
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
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	
</head>

<body>
<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(../images/mesa.jpg);">
<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="../vista/vistaAdm.php">ToyNet</a></h1>&nbsp;&nbsp;<img src="../images/toy.png" width="38" style="margin-top:15px; margin-left:-690px; >
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="../vista/vistaClien.php">Inicio</a>
								</li>
								<li>
									<a class="fh5co-sub-ddown">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marUsuario.php">Marca</a></li>
										<li><a href="../vista/cateUsuario.php">Clasificacion</a></li>
										
									</ul>
								</li>
								<li>
									<a href="../vista/cerrar_sesion.php" class="fh5co-sub-ddown">Cerrar Sesion</a>
									 </li>
									</ul>
								</li>
							</ul>
								
						</nav>
					</div>
				</div>
			</header>
			<br>
    <div class="container" id="log-in-form">
        <div class="heading">
            <h1>Crear Mesa de regalos</h1>
        </div>
        <?php  ?>
        <form name="RegistrarMesa" action="../controlador/MesaCtrl.php"  method="post">
		<div class="form-group">
               <input type="hidden"  name="accion" value="RegistrarMesa">

            <div class="form-group">
                <input type="text" class="form-control" id="nombre_festejado" name="nombre_festejado"   autocomplete="off" minlength="5" maxlength="45" placeholder="Nombre del Festejado" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="fecha_mesa" name="fecha_mesa" placeholder="Fecha del evento" autocomplete="off" required>
            </div>
			<br>

			<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["usuario"]; ?>">
            <div class="form-group form-group-btn">
                
              <button type="submit" class="btn btn-success btn-lg">Crear</button><a href="jugueteMesa.php?id_usuario=<?php echo $_SESSION["usuario"] ?>"></a>
            </div>   
			
            <div class="clearfix"></div>
            <div class="checkbox">
               
            </div>
        </form>
    </div>
</body>

</html>
