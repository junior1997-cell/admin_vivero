<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//ornamnetal
	public function totalornamnetal()
	{
		$sql="SELECT COUNT(*) as totalornamnetal FROM planta categoria WHERE id_categoria = 1";
		return ejecutarConsulta($sql);
	}
	
	//arboles
	public function totalarboles()
	{
		$sql="SELECT COUNT(*) as totalarboles FROM planta categoria WHERE id_categoria = 2";
		return ejecutarConsulta($sql);
	}
	
	//flores
	public function totalflores()
	{
		$sql="SELECT COUNT(*) as totalflores FROM planta categoria WHERE id_categoria = 3";
		return ejecutarConsulta($sql);
	}	
	//imagenes escritorios
	public function imagesscritorio(){
		$sql = "SELECT img, estado FROM planta WHERE estado=1";
		return ejecutarConsulta($sql);
	}

}

?>