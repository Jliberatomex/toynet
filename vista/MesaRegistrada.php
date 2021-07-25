<?php 
echo "<script type='text/javascript'>
	 alert('La Mesa  fué creada correctamente');
	window.location='../vista/jugueteMesa.php';
	</script>";

require_once '../modelo/Mesa.php';
require_once '../controlador/MesaCtrl.php';
$mes= new Mesa();
$mes=buscarMesa($_GET['id_Mesa']);	
?>