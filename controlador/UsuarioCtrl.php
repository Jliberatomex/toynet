<?php 

	/*
	*@autor Eduardo Joshua Lopez Liberato.
	*@Equipo Fevar
	*Funcionalidad de Controlador Usuarios
*/

	require_once('../modelo/Usuario.php');
	require_once("../modelo/Conexion.php");

	if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarUsuario'){
			insertarUsuario();
		}else if($accion=='ActualizarUsuario'){
			actualizarUsuario();
		}else if($accion=='EliminarUsuario'){  
			eliminarUsuario();
		}else if($accion=='buscarUsuario'){ //metodo para buscar una sola usuario
			
		}
	  }

	  //Funcion que inserta Usuario
	  function insertarUsuario(){
		$nomUsua=$_POST['nombreUsua'];
		$apeP=$_POST['apellidoP'];
		$apeM=$_POST['apellidoM'];
		$em=$_POST['email'];
		$cont=$_POST['contrasena'];
		$tipoU=$_POST['tipo_usuario'];

		$con=Conexion::Conectar();
		try{
		$sql="INSERT INTO usuario(nombreUsua,apellidoP,apellidoM,email,contrasena,tipo_usuario)";
		$sql.="VALUES(:nomUsua,:apeP,:apeM,:em,:cont,:tipoU)";
		$ps=$con->prepare($sql);//ps=PrepareStatement
		$ps->bindParam(':nomUsua',$nomUsua);
		$ps->bindParam(':apeP',$apeP);
		$ps->bindParam(':apeM',$apeM);
		$ps->bindParam(':em',$em);
		$ps->bindParam(':cont',$cont);
		$ps->bindParam(':tipoU',$tipoU);

		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				header('Location:../index.php');
			}
		}
	  }catch(Exception $e){
	  	header('Location:../vista/ErrorUsua.php');
		die($e->getMessage());
	  }

	}


	//Funcion que actualiza Usuarios
	function actualizarUsuario(){
		$nomUsua=$_POST['nombreUsua'];
		$idUsua=$_POST['id_Usuario'];
		$con=Conexion::Conectar();
		$sql="UPDATE usuario SET nombreUsua='$nomUsua'";
		$sql.="WHERE id_Usuario='$idUsua'";
		$ps=$con->prepare($sql);
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute();
			if($ps){
				//header('Location:../vista/marca.php');
			}
		}
	}


	//Function que obtiene Usuario con array
	function obtenerUsuario(){
		$misusuarios=array();
		$con=Conexion::Conectar();
		$sql="SELECT * FROM usuario";
		$res=$con->prepare($sql);
		if(!$res){
			echo "Error".$con->errorInfo();
		}else{
			$res->execute();

			while($regis=$res->fetch(PDO::FETCH_ASSOC)){
				$usuario = new Usuario();
				$usuario->setId_Usuario($regis['id_Usuario']);
				$usuario->setNombreUsua($regis['nombreUsua']);
				$usuario->setApellidoP($regis['apellidoP']);
				$usuario->setApellidoM($regis['apellidoM']);
				$usuario->setEmail($regis['email']);
				$misusuarios[]=$usuario;

			}
			return $misusuarios;
		}
	}

	//Funcion que elimina Usuario
	function eliminarUsuario(){

		
		$idUsua=$_POST['id_Usuario'];
		$con=Conexion::Conectar();
		$sql="DELETE FROM usuario WHERE id_Usuario='$idUsua'";
		$ps=$con->prepare($sql);
		
		if(!$ps){
			echo 'Error'.$con->errorInfo();
		}else{
			$ps->execute(array(":id_Usuario"=>$id_Usuario));
			if($ps){
			//header('Location:../vista/usuario.php');
			}
		}
	}


	//OBTIENE 1 USUARIO	
	 function buscarUsuario($id_Usuario){
		$con=Conexion::Conectar();
		$sql="SELECT * FROM usuario WHERE id_Usuario=:id_Usuario";
		$resultado=$con->prepare($sql);

		if(!$resultado){
			echo "Error".$con->errorInfo();
		}else{
			$resultado->execute(array(":id_Usuario"=>$id_Usuario));
          while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $usua = new Usuario();
			       $usua->setId_Usuario($registros['id_Usuario']);
              	   $usua->setNombreUsua($registros['nombreUsua']);
              	   $usua->setApellidoP($registros['apellidoP']);
              	   $usua->setApellidoM($registros['apellidoM']);
              	   $usua->setEmail($registros['email']);
              	   $usua->setContrasena($registros['contrasena']);		
           }
          	return $usua;		
		}
	}

?>