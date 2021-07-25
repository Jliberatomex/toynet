<?php

	/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Mesa
*/

	require_once('../modelo/Mesa.php');
	require_once('../modelo/MesaJu.php');
	require_once("../modelo/Conexion.php");


		//Se evaluan las condiciones segun las acciones
	if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarMesa'){
			insertarMesa();
		}else if($accion=='ActualizarMesa'){
			actualizarMesa();
		}else if($accion=='EliminarMesa'){  
			eliminarMesa();
		}else if($accion=='buscarMesa'){ //metodo para buscar una sola mesa
			consulMesaJu();	
		}else if($accion=='RegistrarJugueMesa'){
			insertarJugueMesa();
		}else if($accion=='EliminarJugueMesa'){
			eliminarMesaJu();
		}else if($accion='Apartar'){
			apartarJu();
		}
	  }

	  //Funcion que inserta Mesa
	  function insertarMesa(){
		$nomFes=$_POST['nombre_festejado'];
		$fecMes=$_POST['fecha_mesa'];	
		$idUsua=$_POST['id_usuario'];
		$con=Conexion::Conectar();
		try{
		$sql="INSERT INTO mesa(nombre_festejado,fecha_mesa,id_usuario)";
		$sql.="VALUES(:nomFes,:fecMes,:idUsua)";
		$ps=$con->prepare($sql);//ps=PrepareStatement
		$ps->bindParam(':nomFes',$nomFes,PDO::PARAM_STR);
		$ps->bindParam(':fecMes',$fecMes);
		$ps->bindParam(':idUsua',$idUsua,PDO::PARAM_STR);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
			//echo 'Error';
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/MesaRegistrada.php');
			}
		}
	}catch(Exception $e){
		//die($e->getMessage());
		header('Location:../vista/ErrorMesa.php');
		
	}
}	


	//Funcion que actualiza Mesa
	function actualizarMesa(){
		$nomFes=$_POST['nombre_Festejado'];
		$fecMes=$_POST['fecha_Mesa'];
		$cant=$_POST['cantidad'];
		$idUsua=$_POST['id_Usuario'];
		$idMesa=$_POST['id_Mesa'];
		$con=Conexion::Conectar();
		$sql="UPDATE mesa SET nombre_Festejado='$nomFes',fecha_Mesa='$fecMes',cantidad='$cant',id_Usuario='$idUsua'";
		$sql.="WHERE id_Mesa='$idMesa'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				//header('Location:../vista/mesa.php');
			}
		}
	}


	//Function que obtiene Mesa con array
	function obtenerMesa(){
		$mismesas=array();
		$con=Conexion::Conectar();
		$sql="SELECT * FROM mesa";
		$res=$con->prepare($sql);
		if(!$res){
			echo "Error".$con->errorInfo();
		}else{
			$res->execute();

			while($regis=$res->fetch(PDO::FETCH_ASSOC)){
				$mesa = new Mesa();
				$mesa->setId_Mesa($regis['id_Mesa']);
				$mesa->setNombre_Festejado($regis['nombre_Festejado']);
				$mesa->setFecha_Mesa($regis['fecha_Mesa']);
				$mesa->setCantidad($regis['cantidad']);
				$mesa->setId_Usuario($regis['id_Usuario']);
				$mismesas[]=$mesa;

			}
			return $mismesas;
		}
	}

	//Funcion que elimina Mesa
	function eliminarMesa(){
		$idMes=$_POST['id_Mesa'];
		$con=Conexion::Conectar();
		$sql="DELETE FROM mesa WHERE id_Mesa='$idMes'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		 }else{
			$ps->execute(array(":id_Mesa"=>$id_Mesa));
			if($ps){
				header('Location:../vista/mesa.php');
			}
		 }
     }


		 function buscarMes($id_Usuario){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM mesa WHERE id_usuario=:id_Usuario";
		$resultado=$con->prepare($sql);
		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Usuario"=>$id_Usuario));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $mes = new Mesa();
       			   $mes->setId_Usuario($registros['id_usuario']);
			       $mes->setId_Mesa($registros['id_Mesa']);
              	   $mes->setNombre_Festejado($registros['nombre_Festejado']);
       			   $mes->setCantidad($registros['cantidad']);
          }
          	return $mes;		
		}
	} 


	//OBTIENE 1 MESA	
	 function buscarMesa($id_Mesa){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM mesa WHERE id_Mesa=:id_Mesa";
		$resultado=$con->prepare($sql);
		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Mesa"=>$id_Mesa));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $mes = new Mesa();
			       $mes->setId_Mesa($registros['id_Mesa']);
              	   $mes->setNombre_Festejado($registros['nombre_Festejado']);
       			   $mes->setCantidad($registros['cantidad']);
       			   $mes->setId_Usuario($registros['id_usuario']);
          }
          	return $mes;		
		}
	}



//FUNCIONES PARA "DETALLE" MESAJUG


		function insertarJugueMesa(){
		$id_Juguete=$_POST['id_Juguete'];
		$id_Mesa=$_POST['id_Mesa'];
		$estado=$_POST['estado'];
		$con=Conexion::Conectar();
		try{
		$sql="INSERT INTO  mesa_jug(id_Juguete,id_Mesa,estado)";
		$sql.="VALUES(:id_Juguete,:id_Mesa,:estado)";
		$ps=$con->prepare($sql);//ps=PrepareStatement
		$ps->bindParam(':id_Juguete',$id_Juguete,PDO::PARAM_STR);
		$ps->bindParam(':id_Mesa',$id_Mesa);
		$ps->bindParam(':estado',$estado);
		
		
		if(!$ps){
			echo 'Error'.$con->errorInfo();
			echo 'Error';
		}else{
			$ps->execute();
			if($ps){
				header('Location:../vista/jugueteMesa.php');
			}
		}
	}catch(Exception $e){
		die($e->getMessage());
		header('Location:../vista/ErrorMesa.php');
		
	}
}

	


		function eliminarMesaJu(){
			$id_Detalle=$_POST['id_Detalle'];
			$con=Conexion::Conectar();
			$sql="DELETE FROM mesa_jug WHERE id_detalle='$id_Detalle'";
			$ps=$con->prepare($sql);
			$ps->execute(array($id_Detalle));
			if(!$ps){
				echo 'Error'.$con->errorInfo();
			}else{
				$ps->execute();
				if($ps){
					header('Location:../vista/mesa.php');
				}
			}

		}

		//obtiene 1 registro mesa juguete
		function  buscarMesaJu($id_Detalle){
			$con=Conexion::Conectar();
			$sql="SELECT * FROM mesa_jug WHERE id_detalle=:id_Detalle";
			$resultado=$con->prepare($sql);
			if(!$resultado){
				echo "Error".$con->errorInfo();
			}else{
				$resultado->execute(array(":id_Detalle"=>$id_Detalle));
				while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
					$mes= new MesaJu();
					$mes->setId_Detalle($registros['id_detalle']);
					
				}
				return $mes;
			}
		}

		//obtiene 1juguete
		function obtieneJu($id_Juguete){
			$con=Conexion::Conectar();
			$sql="SELECT * FROM mesa_jug WHERE id_Juguete=:id_Juguete";
			$resultado=$con->prepare($sql);
			if(!$resultado){
				echo 'Error'.$con->errorInfo();
			}else{
				$resultado->execute(array(":id_Juguete"=>$id_Juguete));
				while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
					$mesa= new MesaJu();
					$mesa->setId_Detalle($registros['id_detalle']);
					$mesa->setId_Juguete($registros['id_Juguete']);
					$mesa->setId_Mesa($registros['id_Mesa']);
					$mesa->setEstado($registros['estado']);
				}
			}
		}




		function consulMesaJu(){
			//$id_Mesa=$_POST['id_Mesa'];
			if($_POST)
			$consu=array();
			$con=Conexion::Conectar();
			$id_Mesa=$_POST['id_Mesa'];
			//$consu=mysql_real_escape_string(addslashes($_GET['id_Mesa']));
			$sql="SELECT id_Juguete FROM mesa_jug WHERE id_Mesa=:id_Mesa AND estado LIKE  'ACTIVO';";
			$res=$con->prepare($sql);
			if(!$res){
				echo "Error".$con->errorInfo();
			}else{
				$res->execute(array(":id_Mesa"=>$id_Mesa));
				while ($regis=$res->fetch(PDO::FETCH_ASSOC)){
					$mesaju= new MesaJu();
					$mesaju->setId_Juguete($regis['id_Juguete']);
					$mesaju->setId_Mesa($regis['id_Mesa']);
					$mesaju->setEstado($regis['estado']);
				 $consu[]=$mesaju;
				}
				return $mesaju;
				header('Location:../vista/vistaClien.php');
			}

		}

		function obtenerMesaJugue($id_Mesa){
			$mismesaJugue=array();
			$con=Conexion::Conectar();
			$sql="SELECT * FROM mesa_jug WHERE id_Mesa=:id_Mesa";
			$res=$con->prepare($sql);
			if(!$res){
				echo "Error".$con->errorInfo();
			}else{
				$res->execute(array(":id_Mesa"=>$id_Mesa));
				while ($regis=$res->fetch(PDO::FETCH_ASSOC)){
					$mesaj=new MesaJu();
					$mesaj->setId_Detalle($regis['id_detalle']);
					$mesaj->setId_Juguete($regis['id_Juguete']);
					$mesaj->setId_Mesa($regis['id_Mesa']);
					$mismesaJugue[]=$mesaj;
				}
				return $mismesaJugue;
			}
		}

		function apartarJu(){
			$id_Juguete=$_POST['id_Juguete'];
			$id_Mesa=$_POST['id_Mesa'];
			$estado=$_POST['estado'];
			$id_detalle=$_POST['id_Detalle'];
			$con=Conexion::Conectar();
			$sql="UPDATE mesa_jug SET id_Juguete='$id_Juguete',id_Mesa='$id_Mesa',estado='$estado'";
			$sql.="WHERE id_detalle='$id_Detalle'";
			$ps=$con->prepare($sql);
			if(!$ps){
				echo 'Error'.$con->errorInfo();
			}else{
				$ps->execute();
				if($ps){
					echo 'actualizado';
				}
			}
		}



		/*
		function obtenerMesaJugue($id_Mesa){
			$mismesaJugue=array();
			$con=Conexion::Conectar();
			$sql="SELECT m.nombre_festejado,j.* FROM  mesa AS m,mesa_jug AS j  WHERE j.id_Mesa=:id_Mesa";
			$res=$con->prepare($sql);
			if(!$res){
				echo "Error".$con->errorInfo();
			}else{
				$res->execute(array(":id_Mesa"=>$id_Mesa));
				while ($regis=$res->fetch(PDO::FETCH_ASSOC)){
					$mesaj=new MesaJu();
					$jugue= new Mesa();


					$mesaj->setId_Detalle($regis['id_detalle']);
					$mesaj->setId_Juguete($regis['id_Juguete']);
					$mesaj->setId_Mesa($regis['id_Mesa']);
					$mismesaJugue[]=$mesaj;
				}
				return $mismesaJugue;
			}
		} */




?>