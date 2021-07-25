<?php

	/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Inicios Sesion
		*/

	session_start();
	require_once("../modelo/Conexion.php");
	require_once("../modelo/Usuario.php");



	//Evalua si el tipo de usuario es administrador para inicio sesion

	$con=Conexion::Conectar();
	$tipo=$_POST['tipo'];

	if($tipo =='administrador'){
	$sql="SELECT * FROM usuario WHERE email=:email AND contrasena=:contrasena AND tipo_usuario='administrador'";
	//ps=Prepared Statement
	$ps=$con->prepare($sql);
	//em=Email
	$email=htmlentities(addslashes($_POST['email']));
	//contrasena
	$contrasena=htmlentities(addslashes($_POST['contrasena']));
	$ps->bindValue(":email",$email);
	$ps->bindValue(":contrasena",$contrasena);
	$ps->execute();

	$registros=$ps->rowCount();

	if($registros!=0){
		session_start();
		$_SESSION["administrador"]=$_POST["email"];
		//$_SESSION['contrasena']=$contra;
		header("Location:../vista/vistaAdm.php");
	}else{
		?>
		<script type="text/javascript">
			alert("Verifica tus datos al iniciar sesion");
			location.href="../vista/inicioAdm.php";
		</script> 
	<?php
	}

	//Evalua si el tipo de usuario es cliente para inicio sesion
}else if($tipo=='usuario'){
	$sql="SELECT * FROM usuario WHERE email=:email AND contrasena=:contrasena AND tipo_usuario='usuario'";
	//ps=Prepared Statement
	$ps=$con->prepare($sql);
	//em=Email
	$em=htmlentities(addslashes($_POST['email']));
	//contrasena
	$contra=htmlentities(addslashes($_POST['contrasena']));
	$ps->bindValue(":email",$em);
	$ps->bindValue(":contrasena",$contra);
	$ps->execute();

	$registros=$ps->rowCount();

	if($registros!=0){
		session_start();
		$_SESSION["usuario"]=$_POST["email"];
		$_SESSION["id_Usuario"];
		header("Location:../vista/vistaClien.php");
	 }else{
		?>
		<script type="text/javascript">
			alert("Verifica tus datos al iniciar sesion");
			location.href="../vista/inicioClien.php";
		</script> 
	<?php
	 }

}

?>