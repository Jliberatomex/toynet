<?php
	/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista Registrar Juguete
   */
	


	session_start();

	if(!isset($_SESSION["administrador"])){
		header("Location:inicioAdm.php");
	}

	require_once '../controlador/MarcaCtrl.php';
	require_once '../modelo/Marca.php';

	require_once '../controlador/CategoriaCtrl.php';
	require_once '../modelo/Categoria.php';

	require_once '../controlador/JugueteCtrl.php';
	require_once '../modelo/Juguete.php';
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
    <link rel="stylesheet" type="text/css" href="styles.css">
	
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
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	
</head>

<body>
<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(../images/trinity.jpg);">
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
										<li><a href="../vista/marca.php">Marca</a></li>
										<li><a href="../vista/categoria.php">Categoria</a></li>
										<li><a href="../vista/juguete.php">Gestion</a></li>
										
									</ul>
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
    <div class="container" id="log-in-form" >
        <div class="heading">
            <h1>Registrar Juguete</h1>
        </div>
        <form class="well-lg form-horizontal" name="RegistrarJugue" enctype="multipart/form-data"  action="../controlador/JugueteCtrl.php" method="post">
        		<input type="hidden" name="accion" value="RegistrarJugue">
		
            <div class="form-group">
                <input type="text" class="form-control" id="nombre_Juguete" autocomplete="off" minlength="3" maxlength="100" pattern="[A-Za-z ]+"  name="nombre_Juguete" placeholder="Nombre del juguete" required>
            </div>
            <div class="form-group">
               <textarea type="text" class="form-control" id="descripcion_Juguete" autocomplete="off" minlength="5" maxlength="500" required pattern="[a-zA-Z0-9]+" name="descripcion_Juguete" placeholder="Descripcion"></textarea>
            </div>
			
			<div class="form-group">
                <input type="number" class="form-control" id="precio" name="precio" min="100" max="10000" autocomplete="off" required placeholder="Costo">
            </div>

             <div class="form-group">
               <input type="file" class="form-control"  accept="image/*" name="archivo"  required />
            </div>

			<br>

			<div class="form-group"> 
				 <label class="col-md-4 control-label">Marca</label>
			  	<div class="col-md-4 selectContainer">
			  	<div class="input-group">
			  		
			  		<select name="id_Marca" id="id_Marca" value="id_Marca" class="form-control selectpicker" required>
			  			<option value="">Seleccione Marca</option>
			  	<?php 
			  			$mismarcas=obtenerMarca();
			  		?>
			  			<?php foreach ($mismarcas as $m ) { ?>

			  					<OPTION NAME="<?php  $m->getId_Marca() ?>"/><?php echo $m->getNombreMarca() ?></OPTION>

			  			<?php }?>
			  		</select>
			  	</div>
			  </div>
		</div>


			<div class="form-group">
			  <label class="col-md-4 control-label">Categoria</label>
			  <div class="col-md-4 selectContainer">
			  	<div class="input-group">
			  		
			  		<select name="id_Categoria" id="id_Categoria" class="form-control selectpicker" required>
			  			<option value="">Seleccione Categoria</option>
			  			<?php 

			  			$miscategorias=obtenerCategoria();

			  			?>

			  			<?php foreach ($miscategorias as $c ) { ?>
			  				<OPTION NAME="<?php  $c->getId_Categoria() ?>"/> <?php ?>  <?php echo $c->getNombre_Categoria() ?> </OPTION>
			  			<?php }?>
			  			
			  		      </select>	
			  	</div>
			  </div>
			</div>		
	</div>			  	 
</div>
			
			<br>
            <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg">Registrar</button>
            </div>   
			
            <div class="clearfix"></div>
            <div class="checkbox">
               
            </div>
        </form>
	</div>	    
</body>

</html>
