<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Vista_web
{
	 public function __construct(){}

//seccion contactanos
  public function mostrar(){
    $sql="SELECT * FROM contactanos WHERE idcontactanos='1'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function mostrarnosotros(){
    $sql="SELECT * FROM nosotros WHERE idnosotros='1'";
    return ejecutarConsultaSimpleFila($sql);
  }

}
?>