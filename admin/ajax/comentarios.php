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
if ($_SESSION['planta']==1)
{
require_once "../modelos/Comentarios.php";

$color=new Comentarios();

$idcolor=isset($_POST["idcolor"])? limpiarCadena($_POST["idcolor"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcolor)){
			$rspta=$color->insertar($nombre);
			echo $rspta ? "Comentario registrado" : "Comentario no se pudo registrar";
		}
		else {
			$rspta=$color->editar($idcolor,$nombre);
			echo $rspta ? "Comentario actualizado" : "Comentario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$color->desactivar($idcolor);
 		echo $rspta ? "Comentario Desactivado" : "Comentario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$color->activar($idcolor);
 		echo $rspta ? "Comentario activado" : "Comentario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$color->mostrar($idcolor);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$color->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?''.
 					'<div class="text-center">
					 	<button class="btn btn-danger" onclick="desactivar('.$reg->idcomentarios.')"><i class="fa fa-close"></i></button>
					</div>':
 					'<div class="text-center">
					 	<button class="btn btn-primary" onclick="activar('.$reg->idcomentarios.')"><i class="fa fa-check"></i></button>
					</div>',
 				"1"=>($reg->sexo)?''.
          '<div class="user-block">
            <img class="profile-user-img img-responsive img-circle" src="../../freshshop/images/avatar_varon.svg" alt="user image">
            <span class="username"><p style="margin-bottom: 0px !important;">'.$reg->comentador.'</p></span>
            <span class="description">Hombre</span>
          </div>':
          '<div class="user-block">
            <img class="profile-user-img img-responsive img-circle" src="../../freshshop/images/avatar_mujer.svg" alt="user image">
            <span class="username"><p style="margin-bottom: 0px !important;">'.$reg->comentador.'</p></span>
            <span class="description">Mujer</span>
          </div>',
				"2"=>$reg->comentario,
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
	case "selectColor":
        $rspta = $color->select();

        while ($reg = $rspta->fetch_object()) {
          echo '<option  value=' . $reg->nombre . '>' . $reg->nombre . '</option>';
        }
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