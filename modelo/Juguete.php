<?php
	

	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Juguete
	 */

	class Juguete{

		private $id_Juguete;
		private $nombre_Juguete;
		private $descripcion_Juguete;
		private $precio;
		private $imagen;
		private $id_Marca;
		private $id_Categoria;
		

		/*Constructor
		function Juguete(){
			$this->id_Juguete="";
			$this->nombre_Juguete="";
			$this->descripcion_Juguete="";
			$this->precio="";
			$this->id_Marca="";
			$this->id_Categoria="";
		} */

		//set y get
		 function getId_Juguete(){
		    return $this->id_Juguete;
		}
		
		 function setId_Juguete($id_Juguete){
		    $this->id_Juguete = $id_Juguete;
		    
		}

		 function getNombre_Juguete(){
		    return $this->nombre_Juguete;
		}
		
		 function setNombre_Juguete($nombre_Juguete){
		    $this->nombre_Juguete = $nombre_Juguete;
		    
		}

		 function getDescripcion_Juguete(){
		    return $this->descripcion_Juguete;
		}
		
		 function setDescripcion_Juguete($descripcion_Juguete){
		    $this->descripcion_Juguete = $descripcion_Juguete;
		    
		}

		 function getPrecio(){
		    return $this->precio;
		}
		
		 function setPrecio($precio){
		    $this->precio = $precio;
		    
		}
		 function getId_Marca(){
		    return $this->id_Marca;
		}
		
		 function setId_Marca($id_Marca){
		    $this->id_Marca = $id_Marca;
		    
		}

		 function getId_Categoria(){
		    return $this->id_Categoria;
		}
		
		 function setId_Categoria($id_Categoria){
		    $this->id_Categoria = $id_Categoria;
		    
		}
		 function getImagen(){
		    return $this->imagen;
		}
		
		 function setImagen($imagen){
		    $this->imagen = $imagen;
		    
		}


	}



?>