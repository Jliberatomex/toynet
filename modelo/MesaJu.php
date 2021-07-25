<?php

/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase MesaJu
	 */

	
	class MesaJu{
		
		private $id_Detalle;
		private $id_Juguete;
		private $id_Mesa;
		private $estado;



		//set y gets
	    function getId_Detalle(){
		    return $this->id_Detalle;
		  }
		
		 function setId_Detalle($id_Detalle){
		    $this->id_Detalle = $id_Detalle;
		}

		 function getId_Juguete(){
		    return $this->id_Juguete;
		}
		
		 function setId_Juguete($id_Juguete){
		    $this->id_Juguete = $id_Juguete;
		}
		 function getId_Mesa(){
		    return $this->id_Mesa;
		}
		
		 function setId_Mesa($id_Mesa){
		    $this->id_Mesa = $id_Mesa;
		    
		}

		 function getEstado(){
		    return $this->estado;
		}
		
		 function setEstado($estado){
		    $this->estado = $estado;
		    
		}
		
	}
	




?>