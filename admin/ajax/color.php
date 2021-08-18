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
require_once "../modelos/Color.php";

$color=new Color();

$idcolor=isset($_POST["idcolor"])? limpiarCadena($_POST["idcolor"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcolor)){
			$rspta=$color->insertar($nombre);
			echo $rspta ? "Color registrado" : "Color no se pudo registrar";
		}
		else {
			$rspta=$color->editar($idcolor,$nombre);
			echo $rspta ? "Color actualizada" : "Color no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$color->desactivar($idcolor);
 		echo $rspta ? "Color Desactivada" : "Color no se puede desactivar";
	break;

	case 'activar':
		$rspta=$color->activar($idcolor);
 		echo $rspta ? "Color activada" : "Color no se puede activar";
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
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcolor.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcolor.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcolor.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcolor.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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