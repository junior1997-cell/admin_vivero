<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/Vista_web.php";

$vista_web=new Vista_web();

$op = $_GET["op"];
switch($op){
	//Mostrar en la vista footer
	case 'mostrar_contact_v':
		$rspta = $vista_web ->mostrar();
    echo json_encode($rspta);
	break;

    case 'mostrar_descrp_v':
		$rspta = $vista_web ->mostrarnosotros();
    echo json_encode($rspta);
	break;

    case 'mostrar_descrp_v_index':
		$rspta = $vista_web ->mostrarnosotros();
    echo json_encode($rspta);
	break;
}

//Fin de las validaciones de acceso

?>