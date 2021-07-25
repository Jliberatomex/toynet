<?php


	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Marca
	 */

	class Marca{

		
		private $id_Marca;
		private $nombreMarca;
		private $descripcionMarca;
		private $imagen;

		/*Constructor
		function Marca(){
			$this->id_Marca="";
			$this->nombreMarca="";
			$this->descripcionMarca="";
			$this->imagen="";
		} */

		//set y get
		function setId_Marca($id_Marca){
		    $this->id_Marca=$id_Marca;
		    
		}

		 function getId_Marca(){
		    return $this->id_Marca;
		}

	    function getNombreMarca() {
           return $this->nombreMarca;
       }

       function setNombreMarca($nombreMarca) {
           $this->nombreMarca = $nombreMarca;
       }

       	 function getDescripcionMarca(){
		     return $this->descripcionMarca;
		 }
		 
	    function setDescripcionMarca($descripcionMarca){
		     $this->descripcionMarca = $descripcionMarca;
		     
		 }

		  function getImagen(){
		      return $this->imagen;
		  }
		  
		   function setImagen($imagen){
		      $this->imagen = $imagen;
		    
		  }  

	}

?>