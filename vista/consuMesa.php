<?php 
/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista Consultar Mesa
   */
 session_start();

  if(!isset($_SESSION["usuario"])){
    header("Location:inicioClien.php");
  }

require_once("../modelo/Conexion.php");

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

	
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="../css/superfish.css">

	<link rel="stylesheet" href="../css/styless.css">



	<script src="../js/modernizr-2.6.2.min.js"></script>


	
</head>

<body>
<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(../images/juguete2.jpg);">
<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="../vista/vistaClien.php">ToyNet</a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="../vista/vistaClien.php">Inicio</a>
								</li>
								<li>
									<a href="../vista/jugueteUsuario.php" class="fh5co-sub-ddown">Juguetes</a>
									<ul class="fh5co-sub-menu">
										<li><a href="../vista/marUsuario.php">Marca</a></li>
										<li><a href="../vista/cateUsuario.php">Clasificacion</a></li>
										
									</ul>
								</li>
								<li><a>Mesa de regalos</a>
								 <ul class="fh5co-sub-menu">
									 	<li><a href="../vista/RegistrarMesa.php">Crear</a></li>
										<li><a href="../vista/consuMesa.php">Consultar</a></li>
										
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
			<br>
    <div class="container" id="log-in-form">
        <div class="heading">
            <h1>Consultar Mesa de Regalos</h1>
        </div>
        <form name="buscarMesa" action="" method="post">
		 	
            <div class="form-group">
            	<!--<input type="hidden" name="accion" value="buscarMesa">-->
                <!--<input type="text" class="form-control" id="nombre" placeholder="Nombre del festejado">-->
            </div>
            <div class="form-group">
               <input type="text" class="form-control" id="id_Mesa" name="id_Mesa" placeholder="Clave del evento">
            </div>
			<br>
            <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg" value="Buscar">Consultar</button>
            </div>   
			
            <div class="clearfix"></div>
            <div class="checkbox">
               
            </div>
        </form>
        <?php 
        	if($_POST){
        		$con=Conexion::Conectar();
        		$id=$_POST['id_Mesa'];
        		$sql="SELECT id_Juguete FROM mesa_jug WHERE id_Mesa=:id_Mesa AND estado LIKE  'ACTIVO'";
        		$stm=$con->prepare($sql);
        		$result=$stm->execute(array(':id_Mesa'=>$id));
        		$rows=$stm->fetchAll(\PDO::FETCH_OBJ);
        		if(count($rows)){
        			?>
        			<div class="container">
        				<div class="" ver2 m-b-110">
        					<table data-vertable="ver2">
        						<thead>
        							<tr class="row100 head">
        								<th class="column100 colum1" data-column="colum1">Nombre Juguete</th>
        								<!--<th class="column100 colum2" data-column="column2">Acciones</th>-->
        								
        							</tr>
        						</thead>
        			<tbody>
        		  <?php	foreach ($rows as $key ) { ?>
        		  		<tr>
        				<td><?php echo $key->id_Juguete; ?></td>
        				<!--<td><a href="../vista/Apartar.php?id_Juguete=<?php //echo $key->id_Juguete; ?>"> Apartar</a></td>-->
        				</tr>
        		<?php	} ?>

        			</tbody>
        		</table>
        	</div>
        </div>
        		<?php }else{
        			echo "<script type='text/javascript'>
	 alert('No existe usuario');
	window.location='../vista/consuMesa.php';
	</script>";;
        		}
        	} 

        ?>
    </div>
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
