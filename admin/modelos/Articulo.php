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
	public function insertar($id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion, $img)
	{
		$sql="INSERT INTO planta (id_categoria, nombre, stock, nombre_cientifico, familia, apodo, descripcion, img)
		VALUES ('$id_categoria','$nombre','$stock','$nombre_cientifico','$familia','$apodo','$descripcion','$img')";

		if ($id_color == "") {
			return ejecutarConsulta($sql);
		}else {
			$planta_id = ejecutarConsulta_retornarID($sql);
			$num_elementos=0;
			$sw=true;

			while ($num_elementos < count($id_color))
			{
				$sql_detalle = "INSERT INTO plantacolor(id_planta, id_color) VALUES('$planta_id', '$id_color[$num_elementos]')";
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos=$num_elementos + 1;
			}
			return $sw;
			
		}
		
	}

	//Implementamos un método para editar registros
	public function editar($idarticulo,$idcategoria,$codigo,$nombre,$stock,$descripcion,$imagen)
	{
		$sql="UPDATE articulo SET idcategoria='$idcategoria',codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',imagen='$imagen' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idarticulo)
	{
		$sql="UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idarticulo)
	{
		$sql="UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idarticulo)
	{
		$sql="SELECT * FROM articulo WHERE idarticulo='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT p.idplanta ,p.id_categoria ,c.nombre as categoria,
			p.nombre, p.stock, p.nombre_cientifico, p.familia, p.apodo, p.descripcion, p.img, p.fecha, p.estado 
		FROM planta p 
		INNER JOIN categoria c ON p.id_categoria =c.idcategoria";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos
	public function listarActivos()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
}

?>