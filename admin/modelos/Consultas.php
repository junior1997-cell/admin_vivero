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
	public function totalornamnetal($mostrar_planta)
	{
		$sql="SELECT COUNT(*) as totalornamnetal FROM planta WHERE id_categoria = $mostrar_planta";
		
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>