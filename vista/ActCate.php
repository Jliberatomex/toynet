<?php 


/**
   * autor: Eduardo Joshua Lopez Liberato
   * Equipo : Fevar
   * Vista Actualizar Categoria
   */
	
  session_start();

  if(!isset($_SESSION["administrador"])){
    header("Location:inicioAdm.php");
  }

  
	require_once '../controlador/CategoriaCtrl.php';
	require_once '../modelo/Categoria.php';

	$cate = new Categoria();
	$cate = buscarCategoria($_GET["id_Categoria"]);
  
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
            <h1 id="fh5co-logo"><a href="index.html">ToyNet</a></h1>
            <!-- START #fh5co-menu-wrap -->
            <nav id="fh5co-menu-wrap" role="navigation">
              <ul class="sf-menu" id="fh5co-primary-menu">
                <li class="active">
                  <a href="vistaAdm.html">Inicio</a>
                </li>
                <li>
                  <a class="fh5co-sub-ddown">Juguetes</a>
                  <ul class="fh5co-sub-menu">
                    <li><a href="formarca.html">Marca</a></li>
                    <li><a href="forcatego.html">Categoria</a></li>
                    <li><a href="altajugu.html">Dar de alta</a></li>
                    
                  </ul>
                </li>
                <li>
                  <a href="index.html" class="fh5co-sub-ddown">Cerrar Sesion</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </header>
      <br>
      
    <div class="container" id="log-in-form">
        <div class="heading">
            <h1>Actualizar Categoria</h1>
        </div>

        <form role="form" name="ActualizarCate" action="../controlador/CategoriaCtrl.php"  enctype="multipart/form-data" method="post"  >  <!--   -->
 
  <input type="hidden" name="accion" value="ActualizarCate" />
   <div class="form-group">
   <!-- <label for="name">Clave</label> -->
    <input type="hidden" class="form-control" value="<?php echo $cate->getId_Categoria(); ?>" name="id_Categoria" required >
  </div>
  <div class="form-group">
    <label for="name">Nombre Categoria</label>
    <input type="text" class="form-control" value="<?php echo $cate->getNombre_Categoria(); ?>" name="nombre_Categoria" required>
  </div>
  <div class="form-group">
    <label for="name">Descripcion </label>
    <input type="text" class="form-control" value="<?php echo $cate->getDescripcion_Categoria(); ?>" name="descripcion_Categoria" required>
  </div>
  <div class="form-group">
    <input type="file" class="form-control" required id="image" accept="img/*" name="image"/>
  </div>

  
  

  <button type="submit" class="btn btn-success">Actualizar</button>
  <a href="../views/categoria.php"/> <button type="button" class="btn btn-danger"   data-dismiss="modal">   Cancelar</button>
</form>


    </div>
</body>

</html>

<!------------------------------------------------------------------------------------------------------------->

<!--<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("../controlador/MarcaCtrl.php",$("#actualizar").serialize(),function(data){
    });
    alert("Actualizacion exitosa!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('show');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script> -->



