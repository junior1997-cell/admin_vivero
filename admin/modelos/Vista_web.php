<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Vista_web
{
	 public function __construct(){}

  //===========seccion contactanos===========
  public function mostrar(){
    $sql="SELECT * FROM contactanos WHERE idcontactanos='1'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function mostrarnosotros(){
    $sql="SELECT * FROM nosotros WHERE idnosotros='1'";
    return ejecutarConsultaSimpleFila($sql);
  }
  
  //===========fin seccion contactanos===========
  // 
  //===========fin Seccion categorias===========
  public function categorias_plantas(){
    $sql="SELECT * FROM categoria WHERE estado='1'";
    return ejecutarConsulta($sql);
  }
  //===========fin Seccion categorias===========

  //=====seccion Plantas===========

    // Plantas all
    
  public function listar_plantas_all(){
    $sql = "SELECT * FROM planta as pl, plantaimg as plimg WHERE pl.idplanta=plimg.id_planta AND plimg.prioridad='p1' ORDER BY idplanta DESC";
    return ejecutarConsulta($sql);
  }
    // Plantas por categorias.
  public function listar_plantas_cat($idcategoria){
    $sql = "SELECT * 
    FROM planta as pl, plantaimg as plimg 
    WHERE 
    pl.idplanta=plimg.id_planta AND plimg.prioridad='p1' AND pl.id_categoria='$idcategoria' AND pl.estado=1 
    ORDER BY idplanta DESC";

    return ejecutarConsulta($sql);
  }
    //=====fin seccion Plantas===========


}
?>