<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/Vista_web.php";

$vista_web=new Vista_web();

$op = $_GET["op"];
switch($op){
  case 'guardar':
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
    $sexo = isset($_POST["sexo"]) ? limpiarCadena($_POST["sexo"]) : "";
    $id_planta = isset($_POST["id_planta_coment"]) ? limpiarCadena($_POST["id_planta_coment"]) : ""; 
    $comentario = isset($_POST["comentario"]) ? limpiarCadena($_POST["comentario"]) : "";

    $id_plant = empty( $id_planta) ? "" : $id_planta; 

			$rspta=$vista_web->insertar($nombre,$sexo,$comentario,$id_plant);
			echo $rspta ? "ok" : "No se pudo registrar comentario";
	break;
  //listar_comentarios
	case 'listar_comentarios':
  
      $rspta = $vista_web->listar_comentarios();
    
    $data = array();
   // $id = 0;

    while ($reg=$rspta->fetch_object()) {
       // $id++;
        $data[] = array(
            "idcomentarios "=>$reg->idcomentarios ,
            "nombre"=>$reg->nombre,
            "sexo"=>$reg->sexo,
            "comentario"=>$reg->comentario,
            "id_planta "=>$reg->id_planta, 
            "fecha"=>$reg->fecha 
        );
    }

    echo json_encode($data);

break;

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
		//Listar categorias
	case 'listar_categorias':
        $rspta = $vista_web->categorias_plantas();
        $data = array();

        while ($reg=$rspta->fetch_object()) {

            $data[] = array(
                "idcategoria" => $reg->idcategoria,
                "nombre" => $reg->nombre
            );
        }
        echo json_encode($data);

    break;

	case 'listar_planta':
        $id_categoria = $_POST["id_categoria"];
        if ($id_categoria =='0') {
            $rspta = $vista_web->listar_plantas_all();
        } else {
            $rspta = $vista_web->listar_plantas_cat($id_categoria);
        }

        $data = array();
       // $id = 0;

        while ($reg=$rspta->fetch_object()) {
           // $id++;
            $data[] = array(
                "idplanta"=>$reg->idplanta,
                "id_categoria"=>$reg->id_categoria,
                "nombre"=>$reg->nombre,
                "nombre_cientifico"=>$reg->nombre_cientifico,
                "stock"=>$reg->stock,
                "familia"=>$reg->familia,
                "apodo"=>$reg->apodo,
                "descripcion"=>$reg->descripcion,
                "img_1"=>$reg->img_1,
                "img_2"=>$reg->img_2,
                "img_3"=>$reg->img_3

            );
        }

        echo json_encode($data);

    break;
  case "selectPlantaComent":
    $rspta = $vista_web->listar_plantas_coment();

    while ($reg = $rspta->fetch_object()) {
      echo '<option value=' . $reg->idplanta  . '>' . $reg->nombre . '</option>';
    }
    break;

	case 'detalles_plantas':
		$idplanta = $_POST["idplanta"];
		$rspta = $vista_web ->detalles_plantas($idplanta);
		echo json_encode($rspta);
	break;

    case 'ver_planta_compra':
		$idplanta_compra = $_POST["idplanta_compra"];
		$rspta = $vista_web ->detalles_plantas($idplanta_compra);
		echo json_encode($rspta);
	break;

  case "selectColor":
    $id_planta = $_POST["idplanta_compra"];
    $rspta = $vista_web->select_color($id_planta);
    if ($rspta->num_rows>0) {
      while ($reg = $rspta->fetch_object()) {
        echo '<option  value="' . $reg->nombre . '">' . $reg->nombre . '</option>';
      }
    }else{
      echo '<option disabled id="sin_color">Sin color</option>';
    }

  break;
  

  case "selectWhatsapp":

    $rspta = $vista_web->select_whatsapp();

    while ($reg = $rspta->fetch_object()) {
      echo '<option  value="' . $reg->numero . '">' . $reg->nombre . ' - '.$reg->numero.'</option>';
    }
  break;
}

//Fin de las validaciones de acceso

?>