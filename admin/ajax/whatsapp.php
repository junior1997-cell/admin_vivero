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
if ($_SESSION['whatsapp']==1)
{
require_once "../modelos/Whatsapp.php";

$whatsapp=new Whatsapp();

$idwhatsapp=isset($_POST["idwhatsapp"])? limpiarCadena($_POST["idwhatsapp"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$numero=isset($_POST["numero"])? limpiarCadena($_POST["numero"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idwhatsapp)){
			$rspta=$whatsapp->insertar($nombre,$numero);
			echo $rspta ? "ok" : "whatsapp no se pudo registrar";
		}else {
			$rspta=$whatsapp->editar($idwhatsapp,$nombre,$numero);
			echo $rspta ? "ok" : "whatsapp no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$whatsapp->desactivar($idwhatsapp);
 		echo $rspta ? "ok" : "whatsapp no se puede desactivar";
	break;

	case 'activar':
		$rspta=$whatsapp->activar($idwhatsapp);
 		echo $rspta ? "ok" : "whatsapp no se puede activar";
	break;

	case 'mostrar':
		$rspta=$whatsapp->mostrar($idwhatsapp);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$whatsapp->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idwhatsapp.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idwhatsapp.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idwhatsapp.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idwhatsapp.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->numero,
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
	case "selectWhatsapp":

        $rspta = $whatsapp->select();

        while ($reg = $rspta->fetch_object()) {
          echo '<option  value=' . $reg->numero . '>' . $reg->nombre . ' - '.$reg->numero.'</option>';
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