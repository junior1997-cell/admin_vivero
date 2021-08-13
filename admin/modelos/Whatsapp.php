<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Whatsapp
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($numero)
	{
		$sql="INSERT INTO whatsapp (numero)
		VALUES ('$numero')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idwhatsapp,$numero)
	{
		$sql="UPDATE whatsapp SET numero='$numero' WHERE idwhatsapp='$idwhatsapp'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar color
	public function desactivar($idwhatsapp)
	{
		$sql="UPDATE whatsapp SET estado='0' WHERE idwhatsapp='$idwhatsapp'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar whatsapp
	public function activar($idwhatsapp)
	{
		$sql="UPDATE whatsapp SET estado='1' WHERE idwhatsapp='$idwhatsapp'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idwhatsapp)
	{
		$sql="SELECT * FROM whatsapp WHERE idwhatsapp='$idwhatsapp'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM whatsapp";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM whatsapp where estado=1";
		return ejecutarConsulta($sql);		
	}
}

?>