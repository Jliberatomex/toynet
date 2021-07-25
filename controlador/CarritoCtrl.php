<?php 
  

	//$jug=new Juguete();
	//$jug=buscarJuguete($_GET['id_Juguete'])
 //	session_start();	

	require_once('../modelo/Juguete.php');
	require_once("../modelo/Conexion.php");
	 class CarritoCtrl{

	public  function carro(){
		if(isset($_GET['id_Juguete'])){
			$id_Juguete=$_GET['id_Juguete'];
		}else{
			$id_Juguete=1;
		}

		if(isset($_GET['action'])){
			$action=$_GET['action'];
		}else{
			$action=""; 
		}

		switch ($action){
			case 'add':
				if(isset($_SESSION['carro'][$id_Juguete])){
					$_SESSION['carro'][$id_Juguete]++;
				}else{

					$_SESSION['carro'][$id_Juguete]=1;
				}
				 break;
			
			case  'remove':
					if(isset($_SESSION['carro'][$id_Juguete])){
					
						$_SESSION['carro'][$id_Juguete]--;
						if($_SESSION['carro'][$id_Juguete]==0){
							unset($_SESSION['carro'][$id_Juguete]);
						}
					
					}
				 break;
			case  'removeProd':
					if(isset($_SESSION['carro'][$id_Juguete])){
					    
					    unset($_SESSION['carro'][$id_Juguete]);
					}
					
				 break;

			case  'empty':
				
				unset($_SESSION['carro'][$id_Juguete]);
			 break;		 
					


				
				
		}





	}




 	/*if(isset($_POST['accion'])){
		$accion=$_POST['accion'];

		if($accion=='RegistrarJugueMesa'){
			insertarJug();





 /*
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id_Juguete']))
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['id_Juguete']==$_GET['id_Juguete']){
				$encontro=true;
				$numero=$i;
			}
		}
		if($encontro=true){
			$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			$_SESSION['carrito']=$arreglo;
		}else{
			$con=Conexion::Conectar();
			$sql="SELECT * FROM juguete where id_Juguete=".$_GET['id_Juguete'];
			$result=$con->prepare($sql);
			if(!$result){
				echo("Error");
			}else{
				$result->execute(array(":id_Juguete"=>$id_Juguete));
				while ($registros=$result->fetch(PDO::FETCH_ASSOC)){
					$jugue=new Juguete();
					$jugue->setNombre_Juguete($registros['id_Juguete']);
					$jugue->setPrecio($registros['precio']);
					$jugue->setImagen($registros['precio']);				
			  }
			  $datosN=array('Id_Juguete'=>$_GET['id_Juguete'],
			  		'Nombre_Juguete'=>
			)
			}
			
		}












	}

/*

 require_once ('../modelo/Carrito.php');
 require_once('../modelo/Juguete.php');

 $car = new Carrito();

 if(isset($_REQUEST['accion']) && !empty($_REQUEST['accion'])){
 	if($_REQUEST['accion'] == 'agregarCarro' && !empty($_REQUEST['id_Juguete'])){
 		$id_Juguete=$_REQUEST['id_Juguete'];
 		$con=Conexion::Conectar();
 		$sql="SELECT * FROM juguete WHERE id_Juguete = ".$id_Juguete;
 		$resultado=$con->prepare($sql);
 		if(!$resultado){
 			
 		   }else{
 			$resultado->execute(array('id_Juguete' =>$id_Juguete));
 			while ($registros=$resultado->fecth(PDO::FETCH_ASSOC)){
 				$jug= new Juguete();
 				$jug->setId_Jugueteria($registros['id_Juguete']);
 				$jug->setNombre_Juguete($registros['nombre_Juguete']);
 				
 				'cantidad' ==1
 				
 			return $jug;
 			}
 		}
 		/*$registros=array(
 			'id_Juguete'=>$registros['id_Juguete'],
 			'nombre_Juguete'=>$registros['nombre_Juguete'],
 			'precio' => $registros['precio'],
 			'cantidad' =>1
 		  );  

 		  $registros=$car->insert($registros);
 		  $redLoc=$registros?'../vista/verCarrito.php':'../vista/prueba.php';
 		  header("Location:".$redLoc); 		
 		}elseif($_REQUEST['accion'] == 'actualizarCarrito'){

 		}	
 	}
 	*/

 }
?>