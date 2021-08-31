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
    $sql = "SELECT * FROM planta WHERE estado=1  
    ORDER BY idplanta DESC";
    return ejecutarConsulta($sql);
  }
    // Plantas por categorias.
  public function listar_plantas_cat($idcategoria){
    $sql = "SELECT * 
    FROM planta as pl
    WHERE 
    pl.id_categoria='$idcategoria' AND pl.estado=1 
    ORDER BY idplanta DESC";

    return ejecutarConsulta($sql);
  }

  public function detalles_plantas($idplanta){
    $sql = "SELECT * FROM planta WHERE estado=1 AND  idplanta='$idplanta'
    ORDER BY idplanta DESC";
    return ejecutarConsultaSimpleFila($sql);
  }
    //=====fin seccion Plantas===========

  //Implementar un método para listar los registros y mostrar en el select
  public function select_color($id_planta)
  {
    $sql="SELECT c.nombre, c.idcolor FROM admin_vivero.color as c, admin_vivero.plantacolor as pc where c.idcolor = pc.id_color and pc.id_planta ='$id_planta'" ;
    return ejecutarConsulta($sql);    
  }

  public function select_whatsapp()
  {
    $sql="SELECT * FROM whatsapp where estado=1";
    return ejecutarConsulta($sql);    
  }

  ///comentarios

  	//Implementamos un método para insertar registros
    public function insertar($nombre,$sexo,$id_planta,$comentario)
    {
      $sql="INSERT INTO comentarios (nombre,sexo,comentario,id_planta,estado)
      VALUES ('$nombre','$sexo','$comentario','$id_planta','1')";
      return ejecutarConsulta($sql);
    }
    //Implementamos un método para listar registros
    public function listar_comentarios(){
      $sql="SELECT * FROM comentarios  WHERE estado=1 ORDER BY idcomentarios DESC";
      return ejecutarConsulta($sql);
    }

     // Plantas all
    
     public function listar_plantas_coment(){
      $sql = "SELECT * FROM planta WHERE estado=1  
      ORDER BY idplanta DESC";
      return ejecutarConsulta($sql);
    }


}
?>