<?php 

	/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Categoria
*/

	require_once('../modelo/Categoria.php');
	require_once("../modelo/Conexion.php");

		if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarCate'){
			insertarCategoria();
		}else if($accion=='ActualizarCate'){
			actualizarCategoria();
		}else if($accion=='EliminarCate'){  
			eliminarCategoria();
		}else if($accion=='buscarCategoria'){ //metodo para buscar una sola categoria
			//obtenCategoria();	
		}
	}


	//Funcion que inserta Categoria
	function insertarCategoria(){
		$nomCate=$_POST['nombre_Categoria'];
		$desCate=$_POST['descripcion_Categoria'];
		$imagen=$_FILES['imagen']['name'];
		$tipo_imagen=$_FILES['imagen']['type'];
		$tamagno_imagen=$_FILES['imagen']['size'];
		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';
		move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetadestino.$imagen);
		$con=Conexion::Conectar();
		try{
			if($tamagno_imagen<=3000000){
				if($tipo_imagen=="image/jpeg"|| $tipo_imagen=="image/jpg" || $tipo_imagen="image/png" ){
		$sql="INSERT INTO categoria(nombre_Categoria,descripcion_Categoria,imagen)";
		$sql.="VALUES(:nomCate,:desCate,:imagen)";
		$ps=$con->prepare($sql);//ps=PrepareStatement
		$ps->bindParam(':nomCate',$nomCate);
		$ps->bindParam(':desCate',$desCate);
		$ps->bindParam(':imagen',$imagen);

		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/categoria.php');
			}
		}
	  }else{
	  		echo"<script type='text/javascript'>
	 		alert('Solo se acepta imagenes jpg y jpeg');
	 		window.location='../vista/RegistrarCate.php';
		;
		</script>";
	  }
	 }else{
	 	echo"<script type='text/javascript'>
	 	alert('El tamaño de imagen es grande');
		window.location='../vista/RegistrarCate.php';
		</script>";
	 } 
	}catch(Exception $e){
		header('Location:../vista/ErrorCate.php');
	}
}

	//Funcion que actualiza Categorias
	function actualizarCategoria(){
		$nomCate=$_POST['nombre_Categoria'];
		$desCate=$_POST['descripcion_Categoria'];
		$image=$_FILES['image']['name'];
		$tipo_imagen=$_FILES['image']['type'];
		$tamagno_image=$_FILES['image']['size'];
		$carpetadestino=$_SERVER['DOCUMENT_ROOT'].'/ToyNet/imagenes/';
		move_uploaded_file($_FILES['image']['tmp_name'],$carpetadestino.$image);
		$idCate=$_POST['id_Categoria'];
		$con=Conexion::Conectar();
		$sql="UPDATE categoria SET nombre_Categoria='$nomCate',descripcion_Categoria='$desCate',imagen='$image'";
		$sql.="WHERE id_Categoria='$idCate'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/categoria.php');
			}
		}
	}


	//Function que obtiene Categorias con array
	function obtenerCategoria(){
		$miscategorias=array();
		$con=Conexion::Conectar();
		$sql="SELECT * FROM categoria";
		$res=$con->prepare($sql);
		if(!$res){
			echo "Error".$con->errorInfo();
		}else{
			$res->execute();

			while($regis=$res->fetch(PDO::FETCH_ASSOC)){
				$categoria = new Categoria();
				$categoria->setId_Categoria($regis['id_Categoria']);
				$categoria->setNombre_Categoria($regis['nombre_Categoria']);
				$categoria->setDescripcion_Categoria($regis['descripcion_Categoria']);
				$categoria->setImagen($regis['imagen']);
				$miscategorias[]=$categoria;

			}
			return $miscategorias;
		}
	}

	//Funcion que elimina Categoria
	function eliminarCategoria(){
		$idCat=$_POST['id_Categoria'];
		$con=Conexion::Conectar();
		$sql="DELETE FROM categoria WHERE id_Categoria='$idCat'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute(array(":id_Categoria"=>$id_Categoria));
			if($ps){
				header('Location:../vista/categoria.php');
			}
		}
	}


	//OBTIENE 1 categoria	
	 function buscarCategoria($id_Categoria){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM categoria WHERE id_Categoria=:id_Categoria";
		$resultado=$con->prepare($sql);

		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Categoria"=>$id_Categoria));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $cate = new Categoria();
			       $cate->setId_Categoria($registros['id_Categoria']);
              	   $cate->setNombre_Categoria($registros['nombre_Categoria']);
              	   $cate->setDescripcion_Categoria($registros['descripcion_Categoria']);
              	   $cate->setImagen($registros['imagen']);
          }
          	return $cate;		
		}
	}
?>