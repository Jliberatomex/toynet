<?php
	
/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista juguete
   */
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

	require_once '../controlador/MesaCtrl.php';
	require_once '../modelo/MesaJu.php';

	$mesaj= new MesaJu();
	$mesaj=obtenerMesaJugue($_SESSION["usuario"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	<div data-stellar-background-ratio="0.5" style="background-image: url(../images/joaquin.jpg);">
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
									<a  href="../vista/jugueteVisitante.php" class="fh5co-sub-ddown">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marVisitante.php">Marcas</a></li>
										<li><a href="../vista/cateVisitante.php">Categorias</a></li>
												
									</ul>
								</li>
								<li>
									<a href="../vista/jugueteMesa.php">Seguir Agregando Juguetes</a>
								</li>

								<li>
									<a href="../vista/cerrar_sesion.php" class="fh5co-sub-ddown">Cerrar Sesion</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<br>
			<br>
			<br>
			<br>
	<h1> Mesa Regalo Juguetes<h1>	
		<br>
		<div class="container-table100">
				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<thead>
							<tr class="row100 head">
							   <!-- <th class="column100 column1" data-column="column1">ID</th> -->
								<th class="column100 column2" data-column="column2">Nombre Juguete</th>
								
								<th class="column100 column8" data-column="column8">Acciones</th>								
							</tr>	
						</thead>
						<tbody>
							<?php foreach($mesaj as $j ) { ?>
								<tr>
									<td><?php echo $j->getId_Juguete(); ?></td>
									
									
									
									
									<td>
										<a href="../vista/EliMesaju.php?id_Detalle=<?php echo $j->getId_Detalle(); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/eliminar.png" width="35px" height="35px"></a>
									</td>
								</tr>
							<?php }  ?>
					
						</tbody>
					</table>
					<br>
					<tr>
					 <a class="btn btn-primary btn-lg" href="#">Generar PDF</a>
					
				</div>

				
				</div>
			</div>
		</div>
	</div>


	

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