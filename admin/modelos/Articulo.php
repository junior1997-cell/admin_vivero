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
	public function insertar($id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion,$espcf_cuidado, $foto1,$foto2, $foto3,$precio_venta)
	{
		$sql="INSERT INTO planta (id_categoria, nombre, stock, nombre_cientifico, familia, apodo, descripcion,espcf_cuidado, img_1, img_2, img_3,precio_venta)
		VALUES ('$id_categoria','$nombre','$stock','$nombre_cientifico','$familia','$apodo','$descripcion','$espcf_cuidado','$foto1','$foto2','$foto3','$precio_venta')";

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

		if ($id_color == "") {
			return true;
		} else {
			return $sw;
		}    	
	}

	//Implementamos un método para editar registros
	public function editar($idplanta,$id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion,$espcf_cuidado, $foto1,$foto2, $foto3,$precio_venta)
	{
		$sw =true;
		$sql="UPDATE admin_vivero.planta SET id_categoria='$id_categoria',nombre='$nombre', stock='$stock',nombre_cientifico = '$nombre_cientifico',
		familia = '$familia',apodo = '$apodo',descripcion='$descripcion', espcf_cuidado='$espcf_cuidado' ,img_1='$foto1' ,img_2='$foto2' ,img_3='$foto3',precio_venta = '$precio_venta'
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
		$sql="SELECT c.nombre as categoria ,p.id_categoria, p.idplanta, p.nombre , p.stock, p.nombre_cientifico, p.familia, p.apodo, p.descripcion, p.img_1, p.img_2, p.img_3, p.precio_venta, p.espcf_cuidado, p.fecha, p.estado
		FROM admin_vivero.planta as p, admin_vivero.categoria as c 
		WHERE p.id_categoria = c.idcategoria and idplanta='$idplanta'";
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
		$sql="SELECT pc.id_color FROM admin_vivero.plantacolor as pc, admin_vivero.planta as p where p.idplanta = pc.id_planta  and p.idplanta = '$idplanta';";
		return ejecutarConsulta($sql);
	}

	public function mostrar_nombre_color($idplanta)
	{
		$sql="SELECT c.nombre FROM admin_vivero.plantacolor as pc, admin_vivero.planta as p, admin_vivero.color as c where p.idplanta = pc.id_planta and c.idcolor = pc.id_color and p.idplanta = '$idplanta';";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT p.idplanta, p.img_1, p.id_categoria ,c.nombre as categoria,
			p.nombre, p.stock, p.nombre_cientifico, p.familia, p.apodo, p.descripcion,p.precio_venta , p.fecha, p.estado 
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

	//Listar planta para las "VENTAS"
	public function listarActivosVenta()
	{
		$sql="SELECT p.descripcion,p.idplanta, p.nombre, p.stock, p.img_1,p.img_2,p.img_3, p.id_categoria,p.precio_venta, c.nombre as categoria 
				FROM admin_vivero.planta as p, admin_vivero.categoria as c 
				where p.id_categoria = c.idcategoria AND p.estado=1;";
		return ejecutarConsulta($sql);		
	}
	// Extraemos el nombre de las plantas para elimanr del directorio
	public function nombreFoto($id_planta){
        $sql = "SELECT * FROM admin_vivero.planta where idplanta ='$id_planta';";
        return ejecutarConsulta($sql);
    }
}

?>