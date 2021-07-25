<?php

/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Marca
*/

	require_once('../modelo/Marca.php');
	require_once('../modelo/Conexion.php');

	if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarMar'){
			insertarMarca();
		}else if($accion=='ActualizarMar'){
			actualizarMarca();
		}else if($accion=='EliminarMar'){  
			eliminarMarca();
		}else if($accion=='buscarMarca'){ //metodo para buscar una sola marca
			//obtenMarca();	
		}
	  }
	

	//Funcion que inserta Marcas
	function insertarMarca(){
		$nomMar=$_POST['nombreMarca'];
		$desMar=$_POST['descripcionMarca'];
		$imagen=$_FILES['imagen']['name'];
		$tipo_imagen=$_FILES['imagen']['type'];
		$tamagno_imagen=$_FILES['imagen']['size'];
		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';
		move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetadestino.$imagen);
		//$archivo_objetivo=fopen($carpetadestino . $imagen,"r");
		//$contenido=fread($archivo_objetivo,$tamagno_archivo);
		//$contenido=addslashes($contenido);
		//fclose($archivo_objetivo);
		$con=Conexion::Conectar();
		try{
			if($tamagno_imagen<=3000000){
				if($tipo_imagen=="image/jpeg"|| $tipo_imagen=="image/jpg"){
			$sql="INSERT INTO marca(nombreMarca,descripcionMarca,imagen)";
			$sql.="VALUES(:nomMar,:desMar,:imagen)";
			$ps=$con->prepare($sql);//ps=PrepareStatement
			$ps->bindParam(':nomMar',$nomMar);
			$ps->bindParam(':desMar',$desMar);
			$ps->bindParam(':imagen',$imagen);
			if(!$ps){
			//echo 'Error'.$con->errorInfo();
			echo 'Error';
			}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/marca.php');
			}
		  }
		}else{
			echo"<script type='text/javascript'>
	 		alert('Solo se acepta imagenes jpg y jpeg');
	 		window.location='../vista/RegistrarMarca.php';
		;
		</script>";
		}
	  }else{
	  	echo"<script type='text/javascript'>
	 	alert('El tamaño de imagen es grande');
		window.location='../vista/RegistrarMarca.php';
		</script>";
	  }

	}catch(Exception $e){
		header('Location:../vista/ErrorMarca.php');
		die($e->getMessage());
	}
}	


	//Funcion que actualiza Marcas
	function actualizarMarca(){
		$nomMar=$_POST['nombreMarca'];
		$desMar=$_POST['descripcionMarca'];
		$image=$_FILES['image']['name'];
		$tipo_image=$_FILES['image']['type'];
		$tamagno_imagen=$_FILES['image']['size'];

		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';

		move_uploaded_file($_FILES['image']['tmp_name'],$carpetadestino.$image);

		$idMar=$_POST['id_Marca'];
		$con=Conexion::Conectar();
		$sql="UPDATE marca SET nombreMarca='$nomMar',descripcionMarca='$desMar',imagen='$image'";
		$sql.="WHERE id_Marca='$idMar'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/marca.php');
			}
		}
	}


	//Function que obtiene Marcas con array
	function obtenerMarca(){
		$mismarcas=array();
		$con=Conexion::Conectar();
		$sql="SELECT * FROM marca";
		$res=$con->prepare($sql);
		if(!$res){
			echo "Error".$con->errorInfo();
		}else{
			$res->execute();

			while($regis=$res->fetch(PDO::FETCH_ASSOC)){
				$marca = new Marca();
				$marca->setId_Marca($regis['id_Marca']);
				$marca->setNombreMarca($regis['nombreMarca']);
				$marca->setDescripcionMarca($regis['descripcionMarca']);
				$marca->setImagen($regis['imagen']);

				$mismarcas[]=$marca;

			}
			return $mismarcas;
		}
	}

	//Funcion que elimina Marca
	function eliminarMarca(){

		//$idMar=$_GET['id_Marca'];
		$idMar=$_POST['id_Marca'];
		$con=Conexion::Conectar();
		$sql="DELETE FROM marca WHERE id_Marca='$idMar'";
		$ps=$con->prepare($sql);
		//$ps->bindParam(':id_Marca',$idMar,PDO::PARAM_INT);
		//$ps->execute(array($id_Marca));
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute(array(":id_Marca"=>$id_Marca));
			if($ps){
				header('Location:../vista/marca.php');
			}
		}
	}


	//OBTIENE 1 MARCA	
	 function buscarMarca($id_Marca){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM marca WHERE id_Marca=:id_Marca";  //SELECT * FROM marca WHERE id_marca =:id"
		$resultado=$con->prepare($sql);

		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Marca"=>$id_Marca));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $mar = new Marca();
			       $mar->setId_Marca($registros['id_Marca']);
              	   $mar->setNombreMarca($registros['nombreMarca']);
       			   $mar->setDescripcionMarca($registros['descripcionMarca']);
       			   $mar->setImagen($registros['imagen']);
          }
          	return $mar;		
		}
	}
?>