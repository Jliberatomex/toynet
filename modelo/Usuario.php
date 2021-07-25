<?php 

	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Usuario
	 */
	class Usuario{
		
		private $id_Usuario;
		private $nombreUsua;
		private $apellidoP;
		private $apellidoM;
		private $email;
		private $contrasena;

		/*Constructor
		function Usuario(){
			$this->id_Usuario="";
			$this->nombreUsua="";
			$this->apellidoP="";
			$this->apellidoM="";
			$this->email="";
			$this->contrasena="";
		} */

		//set y get
		 function getId_Usuario(){
		    return $this->id_Usuario;
		}
		
		 function setId_Usuario($id_Usuario){
		    $this->id_Usuario = $id_Usuario;
		    
		}

		 function getNombreUsua(){
		    return $this->nombreUsua;
		}
		
		 function setNombreUsua($nombreUsua){
		    $this->nombreUsua = $nombreUsua;   
		}

		 function getApellidoP(){
		    return $this->apellidoP;
		}
		
		 function setApellido($apellidoP){
		    $this->apellidoP = $apellidoM;
		}
		 function getEmail()
		{
		    return $this->email;
		}
		
		 function setEmail($email){
		    $this->email = $email;
		    
		}

		 function getContrasena(){
		    return $this->contrasena;
		}
		
		 function setContrasena($contrasena){
		    $this->contrasena = $contrasena;
		    
		}
		
	}


?>
