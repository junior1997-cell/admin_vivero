<?php 
ob_start();
if (strlen(session_id()) < 1){
  session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"]))
{
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}
else
{
//Validamos el acceso solo al usuario logueado y autorizado.
if ($_SESSION['carrucel']==1)
{
require_once "../modelos/Carrucel.php";

$carrucel=new Carrucel();

$idcarrucel=isset($_POST["idcarrucel"])? limpiarCadena($_POST["idcarrucel"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$img=isset($_POST["img"])? limpiarCadena($_POST["img"]):"";
$img_actual=isset($_POST["img_actual"])? limpiarCadena($_POST["img_actual"]):"";

switch ($_GET["op"]){
  case 'guardaryeditar':

     if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])){
      $flat_img=false;
      $img=$_POST["img_actual"];
    }else{
      $flat_img=true;
      $ext_p = explode(".", $_FILES["img"]["name"]);
      if (true ){
        $img = rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext_p);
        move_uploaded_file($_FILES["img"]["tmp_name"], "../files/carrucel/" . $img);
      }
    }

    if (empty($idcarrucel)){
      $rspta=$carrucel->insertar($nombre,$img);
      echo $rspta ? "ok" : "Imagen no se pudo registrar";
    }
    else {
      if($flat_img==true){
            $datos_f =$carrucel->nombreimg($idcarrucel);
            $nombre_img_ant=$datos_f->fetch_object()->img;
            if($nombre_img_ant!=""){
              unlink("../files/carrucel/".$nombre_img_ant);
            }
        }

      $rspta=$carrucel->editar($idcarrucel,$nombre,$img);
      echo $rspta ? "ok" : "Imagen no se pudo actualizar";
    }

  break;

  case 'desactivar':
    $rspta=$carrucel->desactivar($idcarrucel);
    echo $rspta ? "ok" : "Imagen no se puede desactivar";
  break;

  case 'activar':
    $rspta=$carrucel->activar($idcarrucel);
    echo $rspta ? "ok" : "Imagen no se puede activar";
  break;

  case 'mostrar':
    $rspta=$carrucel->mostrar($idcarrucel);
    //Codificar el resultado utilizando json
    echo json_encode($rspta);
  break;

  case 'listar':
    $rspta=$carrucel->listar();
    //Vamos a declarar un array
    $data= Array();

    while ($reg=$rspta->fetch_object()){

      $ext_data = explode(".", $reg->img); $ext = end($ext_data); $estado = true;
      
      if ($ext == "webp" || $ext == "WEBP" ) { $estado = true; } else { $estado = false; }
      
      $data[]=array(
        "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcarrucel.')"><i class="fa fa-pencil"></i></button>'.
          ' <button class="btn btn-danger" onclick="desactivar('.$reg->idcarrucel.')"><i class="fa fa-close"></i></button>':
          '<button class="btn btn-warning" onclick="mostrar('.$reg->idcarrucel.')"><i class="fa fa-pencil"></i></button>'.
          ' <button class="btn btn-primary" onclick="activar('.$reg->idcarrucel.')"><i class="fa fa-check"></i></button>',
        "1"=>$reg->nombre,
        "2"=>($estado)?'<img src="../files/carrucel/'.$reg->img.'" height="50px" width="50px">':' <video src="../files/carrucel/'.$reg->img.'" autoplay muted loop height="50px" width="70px"></video>',        
        "3"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
        '<span class="label bg-red">Desactivado</span>'
        );
    }
    $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

  break;
}
//Fin de las validaciones de acceso
}
else
{
  require 'noacceso.php';
}
}
ob_end_flush();
?>