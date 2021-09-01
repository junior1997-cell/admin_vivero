<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Comentarios
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT c.id_comentario, c.nombre as comentador, c.sexo as sexo, c.comentario as comentario, c.estado ,c.fecha 
		FROM admin_vivero.comentarios as c;";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para desactivar COMENTARIOS
	public function desactivar($id_comentario)
	{
		$sql="UPDATE comentarios SET estado='0' WHERE id_comentario='$id_comentario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar COMENTARIOS
	public function activar($id_comentario)
	{
		$sql="UPDATE comentarios SET estado='1' WHERE id_comentario='$id_comentario'";
		return ejecutarConsulta($sql);
	}


	
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM comentarios where estado=1";
		return ejecutarConsulta($sql);		
	}
}

?>