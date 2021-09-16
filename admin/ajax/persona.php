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
if ($_SESSION['ventas']==1 || $_SESSION['compras']==1)
{
require_once "../modelos/Persona.php";

$persona=new Persona();

$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$tipo_persona=isset($_POST["tipo_persona"])? limpiarCadena($_POST["tipo_persona"]):"";
$tipo_cliente=isset($_POST["tipo_cliente"])? limpiarCadena($_POST["tipo_cliente"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellidos_nombre_comercial=isset($_POST["apellidos_nombre_comercial"])? limpiarCadena($_POST["apellidos_nombre_comercial"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$nacimiento=isset($_POST["nacimiento"])? limpiarCadena($_POST["nacimiento"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idpersona)){
			$rspta=$persona->insertar($tipo_persona,$tipo_cliente,$nombre,$apellidos_nombre_comercial,$tipo_documento,$num_documento,$direccion,$nacimiento,$telefono,$email);
			echo $rspta ? "ok" : "Persona no se pudo registrar";
		}
		else {
			$rspta=$persona->editar($idpersona,$tipo_persona,$tipo_cliente,$nombre,$apellidos_nombre_comercial,$tipo_documento,$num_documento,$direccion,$nacimiento,$telefono,$email);
			echo $rspta ? "ok" : "Persona no se pudo actualizar";
			// echo $idpersona,$tipo_persona,$tipo_cliente,$nombre,$apellidos_nombre_comercial,$tipo_documento,$num_documento,$direccion,$nacimiento,$telefono,$email;
		}
	break;

	case 'eliminar':
		$rspta=$persona->eliminar($idpersona);
 		echo $rspta ? "ok" : "Persona no se puede eliminar";
	break;

	case 'mostrar':
		$rspta=$persona->mostrar($idpersona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listarp':
		$rspta=$persona->listarp();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idpersona.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->tipo_documento,
 				"3"=>$reg->num_documento,
 				"4"=>$reg->telefono,
 				"5"=>$reg->email
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'listarc':
		$rspta=$persona->listarc();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idpersona.')"><i class="fa fa-trash"></i></button>',
 				"1"=>'<div class="user-block">
						<img class="profile-user-img img-responsive img-circle" src="../files/usuarios/cliente.svg" alt="user image">
						<span class="username"><p style="margin-bottom: 0px !important;">'.$reg->nombre.'</p></span>
						<span class="description"> <b>'.$reg->tipo_documento.'</b>: '.$reg->num_documento.'</span>
					</div>',
 				"2"=>$reg->tipo_cliente,
 				"3"=>$reg->nacimiento,
 				"4"=>$reg->telefono,
 				"5"=>$reg->email
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	// buscar datos de RENIEC
	case 'reniec':
             
		$dni = $_POST["dni"];

		$rspta=$persona->datos_reniec($dni);
		 
		echo json_encode($rspta);

	break;
	// buscar datos de SUNAT
	case 'sunat':

		$ruc = $_POST["ruc"];

		$rspta=$persona->datos_sunat($ruc);
		 
		echo json_encode($rspta);	
			
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