<?php
	
	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Categoria
	 */

	class Categoria{
		
		private $id_Categoria;
		private $nombre_Categoria;
		private $descripcion_Categoria;
		private $imagen;

		/* Constructor
		function Categoria(){
			$this->id_Categoria="";
			$this->nombre_Categoria="";
			$this->descripcion_Categoria="";
		} */

		//set y get
		 function getId_Categoria(){
		    return $this->id_Categoria;
		}
		
		 function setId_Categoria($id_Categoria){
		    $this->id_Categoria = $id_Categoria;
		    
		}

		 function getNombre_Categoria(){
		    return $this->nombre_Categoria;
		}
		
		 function setNombre_Categoria($nombre_Categoria){
		    $this->nombre_Categoria = $nombre_Categoria;
		
		}

		 function getDescripcion_Categoria(){
		    return $this->descripcion_Categoria;
		}
		
		 function setDescripcion_Categoria($descripcion_Categoria){
		    $this->descripcion_Categoria = $descripcion_Categoria;
		    
		}

		function getImagen(){
		      return $this->imagen;
		  }
		  
		 function setImagen($imagen){
		      $this->imagen = $imagen;
		    
		  } 

	}

?>