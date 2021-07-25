<?php

	

	require_once '../controlador/MarcaCtrl.php';
	require_once '../modelo/Marca.php';

	

	$mismarcas=obtenerMarca();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
	<div data-stellar-background-ratio="0.5" style="background-image: url(../images/rayos.jpg);">
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
		<br>
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="../index.php">ToyNet</a></h1>&nbsp;&nbsp;<img src="../images/toy.png" width="38" style="margin-top:15px;"  >
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="../index.php">Inicio</a>
								</li>
								<li>
									<a class="fh5co-sub-ddown" href="../vista/jugueteVisitante.php">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marVisitante.php">Marcas</a></li>
										<li><a href="../vista/cateVisitante.php">Categorias</a></li>								
									</ul>
								</li>
							<li>
									<a class="fh5co-sub-down" href="../vista/inicioClien.php">Inicio Sesion</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/RegistroUsuario.php">Registro</a></li>
										
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
		<div class="fh5co-listing">
			<div class="container-table100">

				<div class="row">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Marcas</h1>
		<br>
		<br>

					<?php foreach($mismarcas as $m){  ?>
								  
					<div class="col-md-4 col-sm-4 fh5co-item-wrap">
						<a class="fh5co-listing-item">
							<img  src="/ToyNet/imagenes/<?php echo $m->getImagen(); ?>" class="img-responsive"  >
							<div class="fh5co-listing-copy">
								<h1 style="text-align: left;font-size:25px;"><?php echo $m->getNombreMarca(); ?></h1>&nbsp;
								<span class="icon">
									<i class="icon-chevron-right"></i>
									<br>
								</span>
							</div>
						</a>
					</div>
				<?php } ?>
				</div>
			

				<script type="text/javascript">
					function confirmation(){
						if(confirm('Esta seguro que desea eliminar?')){
							location.href='../controlador/MarcaCtrl.php?accion=EliminarMar&idMarca=<?php $m->getIdMarca();?>'
						}
					}
				</script>


			
			</div>
		</div>
	</div>
	<!-- END fh5co-page -->

	</div>




	<!-- END fh5co-wrapper -->

	<!-- jQuery -->
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
	
	</body>
</html>

