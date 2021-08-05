<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Carrucel
{
	//Implementamos nuestro constructor
	public function __construct(){

	}

	public function insertar($nombre,$img){
		$sql="INSERT INTO carrucel (nombre,img)
		VALUES ('$nombre','$img')";
		return ejecutarConsulta($sql);
	}

	public function editar($idcarrucel,$nombre,$img){
		$sql="UPDATE carrucel SET nombre='$nombre',img='$img' WHERE idcarrucel='$idcarrucel'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idcarrucel){
		$sql="SELECT * FROM carrucel WHERE idcarrucel='$idcarrucel'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function listar(){
		$sql="SELECT * FROM carrucel";
		return ejecutarConsulta($sql);
	}

	public function listar_web(){
		$sql="SELECT * FROM carrucel WHERE estado = '0' ORDER BY idcarrucel";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idcarrucel){
		$sql = "DELETE FROM carrucel WHERE idcarrucel = '$idcarrucel'";
		return ejecutarConsulta($sql);
	}

	public function desactivar($idcarrucel){
		$sql = "UPDATE carrucel SET estado='0' WHERE idcarrucel = '$idcarrucel'";
		return ejecutarConsulta($sql);
	}

	public function activar($idcarrucel){
		$sql = "UPDATE carrucel SET estado='1' WHERE idcarrucel = '$idcarrucel'";
		return ejecutarConsulta($sql);
	}

	public function nombreimg($idcarrucel){
        $sql = "SELECT * FROM carrucel WHERE idcarrucel='$idcarrucel'";
        return ejecutarConsulta($sql);
    }
}

?>