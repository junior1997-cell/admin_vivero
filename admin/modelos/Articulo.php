<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Articulo
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion, $foto1,$foto2, $foto3)
	{
		$sql="INSERT INTO planta (id_categoria, nombre, stock, nombre_cientifico, familia, apodo, descripcion, img_1, img_2, img_3)
		VALUES ('$id_categoria','$nombre','$stock','$nombre_cientifico','$familia','$apodo','$descripcion','$foto1','$foto2','$foto3')";

    	$planta_id = ejecutarConsulta_retornarID($sql);

		if ($id_color != "") {			
			$num_elementos=0;
			$sw=true;
			while ($num_elementos < count($id_color))
			{
				$sql_detalle = "INSERT INTO plantacolor(id_planta, id_color) VALUES('$planta_id', '$id_color[$num_elementos]')";
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos=$num_elementos + 1;
			}		
		}

    	return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($idplanta,$id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion, $foto1,$foto2, $foto3)
	{
		$sql="UPDATE admin_vivero.planta SET id_categoria='$id_categoria',nombre='$nombre', stock='$stock',nombre_cientifico = '$nombre_cientifico',
		familia = '$familia',apodo = '$apodo',descripcion='$descripcion' ,img_1='$foto1' ,img_2='$foto2' ,img_3='$foto3' 
		WHERE idplanta='$idplanta'";
		ejecutarConsulta($sql);

		//Eliminamos todos los colores
		$sqldel="delete FROM admin_vivero.plantacolor where id_planta = '$idplanta' ;";
		ejecutarConsulta($sqldel);

		//Agregamos lo nuevos colores
		if ($id_color != "") {			
			$num_elementos=0;
			$sw=true;
			while ($num_elementos < count($id_color))
			{
				$sql_detalle = "INSERT INTO plantacolor(id_planta, id_color) VALUES('$idplanta', '$id_color[$num_elementos]')";
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos=$num_elementos + 1;
			}		
		}

		return $sw;
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idplanta)
	{
		$sql="UPDATE planta SET estado='0' WHERE idplanta='$idplanta'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idplanta)
	{
		$sql="UPDATE planta SET estado='1' WHERE idplanta='$idplanta'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idplanta)
	{
		$sql="SELECT * FROM admin_vivero.planta WHERE idplanta='$idplanta'";
		return ejecutarConsultaSimpleFila($sql);
	}

  	//Ver imagenees
	// public function mostrar_img($idplanta)
	// {
	// 	$sql="SELECT pi.img,pi.id_planta,pi.prioridad FROM admin_vivero.plantaimg as pi, admin_vivero.planta as p where p.idplanta = pi.id_planta and p.idplanta ='$idplanta';";
	// 	return ejecutarConsulta($sql);
	// }
	//Ver colores selecionados
	public function mostrar_color($idplanta)
	{
		$sql="SELECT pc.id_color  FROM admin_vivero.plantacolor as pc, admin_vivero.planta as p where p.idplanta = pc.id_planta and p.idplanta = '$idplanta';";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT p.idplanta ,p.id_categoria ,c.nombre as categoria,
			p.nombre, p.stock, p.nombre_cientifico, p.familia, p.apodo, p.descripcion, p.fecha, p.estado 
		FROM planta p 
		INNER JOIN categoria c ON p.id_categoria =c.idcategoria";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT a.idplanta,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT a.idplanta,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idplanta=a.idplanta order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
	// funcion para eliminar foto del directorio
	public function nombreFoto($id_planta){
        $sql = "SELECT * FROM admin_vivero.planta where idplanta ='$id_planta';";
        return ejecutarConsulta($sql);
    }
}

?>