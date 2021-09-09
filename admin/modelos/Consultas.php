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
	
	public function ventasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_hora,'%M') as fecha,SUM(total_venta) as total FROM venta GROUP by MONTH(fecha_hora) ORDER BY fecha_hora DESC limit 0,10";
		return ejecutarConsulta($sql);
	}
}

?>