<?php


	/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Juguete
*/

	require_once('../modelo/Juguete.php');
	require_once("../modelo/Conexion.php");

	if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarJugue'){
			insertarJug();
		}else if($accion=='ActualizarJugue'){
			actualizarJuguete();
		}else if($accion=='EliminarJugue'){  
			eliminarJuguete();
		}else if($accion=='buscarJuguete'){ //metodo para buscar una solo juguete
			//obtenJuguete();	
		}elseif ($accion=='mostrarJuguete') {
			mostrarJuguete();
		}
	}

	//Funcion que inserta Juguetes

	function insertarJug(){
		$nomJu=$_POST['nombre_Juguete'];
		$desJu=$_POST['descripcion_Juguete'];
		$preci=$_POST['precio'];
		$archivo=$_FILES['archivo']['name'];
		$tipo_archivo=$_FILES['archivo']['type'];
		$tamagno_archivo=$_FILES['archivo']['size'];
		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';
		move_uploaded_file($_FILES['archivo']['tmp_name'],$carpetadestino.$archivo);
		$id_Marca=$_POST['id_Marca'];
		$id_Categoria=$_POST['id_Categoria'];

		$con=Conexion::Conectar();
		try{
			if($tamagno_archivo<=3000000){
				if($tipo_archivo=="image/jpg" || $tipo_archivo=="img/jpg" || $tipo_archivo="img/png"){
		$sql="INSERT INTO juguete(nombre_Juguete,descripcion_Juguete,precio,archivo,id_Marca,id_Categoria)";
		$sql.="VALUES(:nomJu,:desJu,:preci,:archivo,:id_Marca,:id_Categoria)";
		$ps=$con->prepare($sql);//ps=PrepareStatement
		$ps->bindParam(':nomJu',$nomJu,PDO::PARAM_STR);
		$ps->bindParam(':desJu',$desJu,PDO::PARAM_STR);
		$ps->bindParam(':preci',$preci);
		$ps->bindParam(':archivo',$archivo);
		$ps->bindParam(':id_Marca',$id_Marca,PDO::PARAM_STR);
		$ps->bindParam(':id_Categoria',$id_Categoria,PDO::PARAM_STR);
		
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/juguete.php');
				
			}
		}
	}else{
		echo"<script type='text/javascript'>
	 		alert('Solo se acepta imagenes jpg y jpeg');
	 		window.location='../vista/RegistrarJuguete.php';
		;
		</script>";
	}
  }else{
  		echo"<script type='text/javascript'>
	 	alert('El tamaño de imagen es grande');
		window.location='../vista/RegistrarJuguete.php';
		</script>";
    }

 }catch(Exception $e){
		die($e->getMessage());
		header("Location:../vista/ErrorJuguete.php");
	}
}

	//Funcion que actualiza Juguete
	function actualizarJuguete(){
		$nomJu=$_POST['nombre_Juguete'];
		$desJu=$_POST['descripcion_Juguete'];
		$preci=$_POST['precio'];
		$archivo=$_FILES['archivo']['name'];
		$tipo_archivo=$_FILES['archivo']['type'];
		$tamagno_archivo=$_FILES['archivo']['size'];
		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';
		move_uploaded_file($_FILES['archivo']['tmp_name'],$carpetadestino.$archivo);
		$id_Marca=$_POST['id_Marca'];
		$id_Categoria=$_POST['id_Categoria'];
		$id_Juguete=$_POST['id_Juguete'];
		$con=Conexion::Conectar();
		try{
			if($tamagno_archivo<=3000000){
				if($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" ){
		$sql="UPDATE juguete SET nombre_Juguete='$nomJu',descripcion_Juguete='$desJu',precio='$preci',archivo='$archivo',id_Marca='$id_Marca',id_Categoria='$id_Categoria'";
		$sql.="WHERE id_Juguete='$id_Juguete'";
		$ps=$con->prepare($sql);
		$ps->bindParam(':nomJu',$nomJu,PDO::PARAM_STR);
		$ps->bindParam(':desJu',$desJu,PDO::PARAM_STR);
		$ps->bindParam(':preci',$preci);
		$ps->bindParam(':archivo',$archivo);
		$ps->bindParam(':id_Marca',$id_Marca,PDO::PARAM_STR);
		$ps->bindParam(':id_Categoria',$id_Categoria,PDO::PARAM_STR);
		//$ps->bindParam(':id_Juguete',$id_Juguete); 
		 if(!$ps){
			echo 'Error'.$con->errorInfo();
		 }else{
			$ps->execute();
			if($ps){
				header('Location:../vista/juguete.php');
			}
		}
	  }else{
	  	echo"<script type='text/javascript'>
	 		alert('Solo se acepta imagenes jpg y jpeg');
	 		
		;
		</script>";

	  }
	}else{
		echo"<script type='text/javascript'>
	 		alert('Tamaño de imagen es grande');
	 		window.location='../vista/RegistrarCate.php';
		;
		</script>";

	}
	}catch(Exception $e){
	header('Location:../vista/ErrorJuguete.php');
 }
}

	//Function que obtiene Juguetes con array
	function obtenerJugue(){
		$misjugue=array();
		$con=Conexion::Conectar();
		$sql="SELECT * FROM juguete";
			$res=$con->prepare($sql);
		if(!$res){
			echo "Error".$con->errorInfo();
		}else{
			$res->execute();

			while($regis=$res->fetch(PDO::FETCH_ASSOC)){
				$jug = new Juguete();
				$jug->setId_Juguete($regis['id_Juguete']);
				$jug->setNombre_Juguete($regis['nombre_Juguete']);
				$jug->setDescripcion_Juguete($regis['descripcion_Juguete']);
				$jug->setPrecio($regis['precio']);
				$jug->setImagen($regis['archivo']);
				$jug->setId_Marca($regis['id_Marca']);
				$jug->setId_Categoria($regis['id_Categoria']);
				$misjugue[]=$jug;
			}
			return $misjugue;
		}
	}

	//Funcion que elimina Juguete
	function eliminarJuguete(){
		$id_Juguete=$_POST['id_Juguete'];
		$con=Conexion::Conectar();
		$sql="DELETE FROM juguete WHERE id_Juguete='$id_Juguete'";
		$ps=$con->prepare($sql);
		$ps->execute(array($id_Juguete));
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/juguete.php');
			}
		}
	}


	//OBTIENE 1 JUGUETE
	 function buscarJuguete($id_Juguete){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM juguete WHERE id_Juguete=:id_Juguete"; 
		$resultado=$con->prepare($sql);
		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Juguete"=>$id_Juguete));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $jug = new Juguete();
			       $jug->setId_Juguete($registros['id_Juguete']);
              	   $jug->setNombre_Juguete($registros['nombre_Juguete']);
              	   $jug->setDescripcion_Juguete($registros['descripcion_Juguete']);
              	   $jug->setPrecio($registros['precio']);
              	   $jug->setImagen($registros['archivo']);
              	   $jug->setId_Marca($registros['id_Marca']);
              	   $jug->setId_Categoria($registros['id_Categoria']);       
          }
          	return $jug;		
		}
	}
	
	 function obteJuguete($id_Juguete=null){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM juguete WHERE id_Juguete=:id_Juguete"; 
		$resultado=$con->prepare($sql);
		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Juguete"=>$id_Juguete));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $jug = new Juguete();
			       $jug->setId_Juguete($registros['id_Juguete']);
              	   $jug->setNombre_Juguete($registros['nombre_Juguete']);
              	   $jug->setDescripcion_Juguete($registros['descripcion_Juguete']);
              	   $jug->setPrecio($registros['precio']);
              	   $jug->setImagen($registros['archivo']);
              	   $jug->setId_Marca($registros['id_Marca']);
              	   $jug->setId_Categoria($registros['id_Categoria']);       
          }
          	return $jug;		
		}
	}

	function mostrarJuguete(){
		$jugues=array();
		$con=Conexion::Conectar();
		$sql="SELECT nombre_Juguete,archivo,id_Marca FROM juguete WHERE id_Marca=:id_Marca";
		$resultado=$con->prepare($sql);
		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute();
			while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
				$jugue = new Juguete();
				$jugue->setNombre_Juguete($registros['nombre_Juguete']);
				$jugue->setImagen($registros['archivo']);
				$jugue->setId_Marca($registros['id_Marca']);
				$jugues[]=$jugue;
			}
			return $jugues;
		}
	}
?>