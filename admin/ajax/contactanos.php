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
if ($_SESSION['almacen']==1)
{
require_once "../modelos/Contactanos.php";

$contactanos=new Contactanos();

 					// seccion contactanos
$coordenadas = isset($_POST["coordenadas"])?limpiarCadena($_POST["coordenadas"]):"";
$direccion = isset($_POST["direccion"])?limpiarCadena($_POST["direccion"]):"";
$email = isset($_POST["email"])?limpiarCadena($_POST["email"]):"";
$telefono = isset($_POST["telefono"])?limpiarCadena($_POST["telefono"]):"";

					// seccion nosotros
$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
$descripcion = isset($_POST["descripcion"])?limpiarCadena($_POST["descripcion"]):"";
$mision = isset($_POST["mision"])?limpiarCadena($_POST["mision"]):"";
$vision = isset($_POST["vision"])?limpiarCadena($_POST["vision"]):"";
$objetivos = isset($_POST["objetivos"])?limpiarCadena($_POST["objetivos"]):"";

$op = $_GET["op"];
switch($op){
	case 'actualizar':
			$rspta = $contactanos ->editar($coordenadas,$direccion,$email,$telefono);
			echo $rspta ? "Actualizado Correctamente" : "No se pudo actualizar";
	break;

	case 'mostrar':
		$rspta = $contactanos ->mostrar();
    echo json_encode($rspta);
	break;

	case 'actualizarnosotros':
			$rspta = $contactanos ->editarnosotros($nombre,nl2br($descripcion),nl2br($mision),nl2br($vision),nl2br($objetivos));			
			echo $rspta ? "Actualizado Correctamente" : "No se pudo actualizar";
	break;

	case 'mostrarnosotros':
		$rspta = $contactanos ->mostrarnosotros();
    echo json_encode($rspta);
	break;
	//Mostrar en la vista
	case 'mostrar_contact_v':
		$rspta = $contactanos ->mostrar();
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