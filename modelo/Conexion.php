<?php


	/**
	 * autor: Eduardo Joshua Lopez Liberato
	 * Equipo : Fevar
	 * Clase Conexion
	 */

  class Conexion{
	
	public static function Conectar(){
		try{
			$con=new PDO('mysql:host=localhost;dbname=toynet','root','');
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$con->exec("SET CHARACTER SET UTF8");

		}catch(Exception $e){
			die("Error al Conectar"+$e->getMessage());
			echo 'Line of error'.$e->getLine();
		}
		return $con;
	}
}

?>