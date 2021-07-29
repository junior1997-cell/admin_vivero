<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Contactanos
{
	 public function __construct(){}

//seccion contactanos
  public function insertar($coordenadas,$direccion,$email,$telefono){
    $sql="INSERT INTO contactanos (coordenadas,direccion,email,telefono) VALUES ('$coordenadas','$direccion','$email','$telefono')";
    return ejecutarConsulta($sql);
  }

  public function editar($coordenadas,$direccion,$email,$telefono){
    $sql="UPDATE contactanos SET	coordenadas='$coordenadas',direccion='$direccion', email='$email', telefono='$telefono'  WHERE idcontactanos='1'";
    return ejecutarConsulta($sql);
  }

  public function mostrar(){
    $sql="SELECT * FROM contactanos WHERE idcontactanos='1'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar(){
    $sql="SELECT * FROM contactanos ORDER BY idcontactanos";
    return ejecutarConsulta($sql);
  }

						//seccion nosotros//

  public function editarnosotros($nombre,$descripcion,$mision,$vision,$objetivos){
    $sql="UPDATE nosotros SET	nombre='$nombre', descripcion='$descripcion', mision='$mision', vision='$vision', objetivos='$objetivos'  WHERE idnosotros='1'";
    return ejecutarConsulta($sql);
  }

  public function mostrarnosotros(){
    $sql="SELECT * FROM nosotros WHERE idnosotros='1'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function listarnosotros(){
    $sql="SELECT * FROM nosotros ORDER BY idnosotros";
    return ejecutarConsulta($sql);
  }
}
?>