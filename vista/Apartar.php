<?php 


  /**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista Apartar
   */
  session_start();

  if(!isset($_SESSION["usuario"])){
    header("Location:inicioClien.php");
  }
	
	require_once '../controlador/MesaCtrl.php';
	require_once '../modelo/MesaJu.php';
    require_once '../modelo/Mesa.php';

	$mesa = new MesaJu();
	$mesa = obtieneJu($_GET["id_Juguete"]);
  /*$mar->setIdMarca($_GET["idmarca"])	;
	echo $mar->getIdMarca(); */
?>
<?php 
  
  require_once '../controlador/MarcaCtrl.php';
  require_once '../modelo/Marca.php';
  
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

  
</head>

<body>
<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(../images/car.jpg);">
<div id="fh5co-wrapper">
    <div id="fh5co-page">
    <div id="fh5co-header">../
      <header id="fh5co-header-section">
        <div class="container">
          <div class="nav-header">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            <h1 id="fh5co-logo"><a href="../vista/vistaAdm.php">ToyNet</a></h1>
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
      
    <div class="container" id="log-in-form">
        <div class="heading">
            <h1>Eliminar Marca</h1>
        </div>

        <form role="form" name="Apartar" onclick="return confirmation();" action="../controlador/MesaCtrl.php" method="post"  >  <!--   -->
 
  <input type="hidden" name="accion" value="Apartar" />
   <div class="form-group">
   <!-- <label for="name">Clave</label> -->
    <input type="hidden" class="form-control" value="<?php echo $mesa->getId_Detalle(); ?>" name="id_detalle" required >
  </div>
  <div class="form-group">
    <label for="name">Nombre Marca</label>
    <input type="text" readonly class="form-control" value="<?php echo $mesa->getId_Juguete(); ?>" name="id_Juguete" required>
  </div>
  <input type="hidden" name="estado" value="INACTIVO">
    <input name="button" type=button onclick="if(confirm('Esta seguro que desea eliminar esta Marca?')){
          this.form.submit();}else{ ;
          }"  value="Eliminar" class="btn btn-danger"  />
          <a href="../vista/marca.php"/> <button type="button" class="btn btn-danger"   data-dismiss="modal">   Cancelar</button>
</form>
      <script type="text/javascript">
          function confirmation(){
            if(confirm('Esta seguro que desea eliminar?')){
              location.href='../controlador/MarcaCtrl.php?accion=EliminarMar&idMarca=<?php //$m->getIdMarca();?>'
            }
          }
        </script>

    </div>
</body>

</html>





