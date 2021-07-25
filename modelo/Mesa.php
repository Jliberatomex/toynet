<?php 

	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Mesa
	 */

	class Mesa{

		private $id_Mesa;
		private $nombre_Festejado;
		private $fecha_Mesa;
		private $cantidad;
		private $id_Usuario;

		
		//set y get
		 function getId_Mesa(){
		    return $this->id_Mesa;
		 }
		
		 function setId_Mesa($id_Mesa){
		    $this->id_Mesa = $id_Mesa;
		    
		  }

		 function getNombre_Festejado(){
		    return $this->nombre_Festejado;
		 }
		
		 function setNombre_Festejado($nombre_Festejado){
		    $this->nombre_Festejado = $nombre_Festejado;
		    
		  }
		 function getFecha_Mesa(){
		    return $this->fecha_mesa;
		   }
		
		 function setFecha_Mesa($fecha_Mesa){
		    $this->fecha_Mesa = $fecha_Mesa; 
		   }

		 function getCantidad(){
		    return $this->cantidad;
		  } 
		
		 function setCantidad($cantidad){
		    $this->cantidad = $cantidad;
		   
		  }

		 function getId_Usuario(){
			    return $this->id_Usuario;
		 }
			
	      function setId_Usuario($id_Usuario){
			    $this->id_Usuario = $id_Usuario;
			    
			}	


	}

?>