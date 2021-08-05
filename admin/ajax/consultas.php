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
if ($_SESSION['consultac']==1 || $_SESSION['consultav']==1)
{
require_once "../modelos/Consultas.php";

$consulta=new Consultas();


switch ($_GET["op"]){
	//#############
	case 'mostrar_ornamentales':
		
		$mostrar_planta=1;

		$rspta = $consulta->totalornamnetal($mostrar_planta);
  		echo json_encode($rspta);
	break;
	//#############
	case 'mostrar_arboles':
		$mostrar_planta=2;
		$rspta = $consulta ->totalornamnetal($mostrar_planta);
        echo json_encode($rspta);
	break;
	//#############
	case 'mostrar_flores':
		$mostrar_planta=3;
		$rspta = $consulta ->totalornamnetal($mostrar_planta);
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