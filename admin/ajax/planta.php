<?php
ob_start();
if (strlen(session_id()) < 1) {
  session_start(); //Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"])) {
  header("Location: ../vistas/login.html"); //Validamos el acceso solo a los usuarios logueados al sistema.
} else {
  //Validamos el acceso solo al usuario logueado y autorizado.
  if ($_SESSION['planta'] == 1) {
    require_once "../modelos/Articulo.php";

    $articulo = new Articulo();

    $idplanta = isset($_POST["idplanta"]) ? limpiarCadena($_POST["idplanta"]) : "";
    $id_categoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
    $id_color = isset($_POST["idcolor"]) ? $_POST["idcolor"] : "";
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
    $stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";
    $precio_venta = isset($_POST["precio_venta"]) ? limpiarCadena($_POST["precio_venta"]) : "";
    $nombre_cientifico = isset($_POST["nombre_cientifico"]) ? limpiarCadena($_POST["nombre_cientifico"]) : "";
    $familia = isset($_POST["familia"]) ? limpiarCadena($_POST["familia"]) : "";
    $apodo = isset($_POST["apodo"]) ? limpiarCadena($_POST["apodo"]) : "";
    $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
    // $img			=isset($_POST["files"])? limpiarCadena($_POST["files"]):"";
    $codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";

    /** IMAGENES **/
    $foto1 = isset($_POST["foto1"]) ? limpiarCadena($_POST["foto1"]) : "";
    $foto2 = isset($_POST["foto2"]) ? limpiarCadena($_POST["foto2"]) : "";
    $foto3 = isset($_POST["foto3"]) ? limpiarCadena($_POST["foto3"]) : "";

    switch ($_GET["op"]) {
      case 'guardaryeditar':

        //*IMAGEN 1*//
        if (!file_exists($_FILES['foto1']['tmp_name']) || !is_uploaded_file($_FILES['foto1']['tmp_name'])) {
          $flat_foto1 = false;
          $foto1 = $_POST["foto1_actual"];
        } else {
          $flat_foto1 = true;
          $ext_p = explode(".", $_FILES["foto1"]["name"]);
          if ($_FILES['foto1']['type'] == "image/webp" || $_FILES['foto1']['type'] == "image/jpeg" || $_FILES['foto1']['type'] == "image/png") {
            $foto1 = rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext_p);
            move_uploaded_file($_FILES["foto1"]["tmp_name"], "../files/articulos/" . $foto1);
          }
        }
        //*IMAGEN 2*//
        if (!file_exists($_FILES['foto2']['tmp_name']) || !is_uploaded_file($_FILES['foto2']['tmp_name'])) {
          $flat_foto2 = false;
          $foto2 = $_POST["foto2_actual"];
        } else {
          $flat_foto2 = true;
          $ext_s = explode(".", $_FILES["foto2"]["name"]);
          if ($_FILES['foto2']['type'] == "image/webp" || $_FILES['foto2']['type'] == "image/jpeg" || $_FILES['foto2']['type'] == "image/png") {
            $foto2 = rand(42, 62) . round(microtime(true)) . rand(63, 83) . '.' . end($ext_s);
            move_uploaded_file($_FILES["foto2"]["tmp_name"], "../files/articulos/" . $foto2);
          }
        }
        //*IMAGEN 3*//
        if (!file_exists($_FILES['foto3']['tmp_name']) || !is_uploaded_file($_FILES['foto3']['tmp_name'])) {
          $flat_foto3 = false;
          $foto3 = $_POST["foto3_actual"];
        } else {
          $flat_foto3 = true;
          $ext_s2 = explode(".", $_FILES["foto3"]["name"]);          
          if ($_FILES['foto3']['type'] == "image/webp" || $_FILES['foto3']['type'] == "image/jpeg" || $_FILES['foto3']['type'] == "image/png") {
            $foto3 = rand(21, 41) . round(microtime(true)) . rand(0, 20) . '.' . end($ext_s2);
            move_uploaded_file($_FILES["foto3"]["tmp_name"], "../files/articulos/" . $foto3);
          }
        }

        if (empty($idplanta)) {
          $rspta = $articulo->insertar($id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion,$foto1,$foto2, $foto3,$precio_venta);
          echo $rspta ? "ok" : "Planta: " . strtoupper($nombre) . " no se pudo registrar";
          
        } else {
          if($flat_foto1==true){
            $datos_f1 =$articulo->nombreFoto($idplanta);
            $nombre_img_1_ant=$datos_f1->fetch_object()->img_1;
            if($nombre_img_1_ant!=""){
              unlink("../files/articulos/".$nombre_img_1_ant);
            }
          }
          if($flat_foto2==true){
            $datos_f2 =$articulo->nombreFoto($idplanta);
            $nombre_img_2_ant=$datos_f2->fetch_object()->img_2;
            if($nombre_img_2_ant!=""){
              unlink("../files/articulos/".$nombre_img_2_ant);
            }
          }
          if($flat_foto3==true){
            $datos_f3 =$articulo->nombreFoto($idplanta);
            $nombre_img_3_ant=$datos_f3->fetch_object()->img_3;
            if($nombre_img_3_ant!=""){
              unlink("../files/articulos/".$nombre_img_3_ant);
            }
          }
          $rspta = $articulo->editar($idplanta, $id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion,$foto1,$foto2, $foto3,$precio_venta);
          echo $rspta ? "ok" : "Planta: " . strtoupper($nombre) . " no se pudo registrar";
        }
       
        break;

      case 'desactivar':
        $rspta = $articulo->desactivar($idplanta);
        echo $rspta ? "ok" : "Artículo no se puede desactivar";
        break;

      case 'activar':
        $rspta = $articulo->activar($idplanta);
        echo $rspta ? "ok" : "Artículo no se puede activar";
        break;

      case 'mostrar':
        $rspta = $articulo->mostrar($idplanta);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

      case 'mostrar_img':
        $rspta = $articulo->mostrar_img($_GET['id_planta']);
        //Vamos a declarar un array
        $array_img = [];
        $con = 0;
        while ($reg = $rspta->fetch_object()) {
          $array_img[] = [
            "id_planta"   => $reg->id_planta,
            "img"         => $reg->img,
            "prioridad"   => $reg->prioridad,
            "count"   => $con = $con + 1,
          ]; 
        }
        echo json_encode($array_img);
        break;
      case 'mostrar_color':
        $rspta = $articulo->mostrar_color($_GET['id_planta']);
        //Vamos a declarar un array
        $array_color = [];
        
        while ($reg = $rspta->fetch_object()) {
          array_push( $array_color , $reg->id_color);
        }
        echo json_encode($array_color);
        break;

      case 'listar':
        $rspta = $articulo->listar();
        //Vamos a declarar un array
        $data = [];
        $img = "";
        while ($reg = $rspta->fetch_object()) {

          if (!empty($reg->img_1)) {
            $img = $reg->img_1;
          } else {
            if (!empty($reg->img_2)) {
              $img = $reg->img_2;
            } else {
              if (!empty($reg->img_3)) {
                $img = $reg->img_3;
              } else {
                $img = "rosa_defecto.svg";
              }
            }           
          }
          
          $data[] = [
            "0" => $reg->estado
              ? '<button class="btn btn-warning" onclick="mostrar(' .$reg->idplanta . ')"><i class="fa fa-pencil"></i></button>' .
                '<button class="btn btn-danger" onclick="desactivar(' . $reg->idplanta . ')"><i class="fa fa-close"></i></button>'
              : '<button class="btn btn-warning" onclick="mostrar(' . $reg->idplanta . ')"><i class="fa fa-pencil"></i></button>' .
                '<button class="btn btn-primary" onclick="activar(' . $reg->idplanta . ')"><i class="fa fa-check"></i></button>',
            "1" =>'<div class="user-block">
                    <img class="profile-user-img img-responsive img-circle" src="../files/articulos/'.$img.'" alt="user image">
                    <span class="username"><p style="margin-bottom: 0px !important;">'.$reg->nombre.'</p></span>
                    <span class="description">'.substr($reg->descripcion, 0, 30).'...</span>
                  </div>',
            "2" => $reg->categoria,
            "3" => $reg->familia,
            "4" => $reg->stock,
            "5" => $reg->estado ? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>',
          ];
        }
        $results = [
          "sEcho" => 1, //Información para el datatables
          "iTotalRecords" => count($data), //enviamos el total registros al datatable
          "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
          "aaData" => $data,
        ];
        echo json_encode($results);

        break;

      case "selectCategoria":
        require_once "../modelos/Categoria.php";
        $categoria = new Categoria();

        $rspta = $categoria->select();

        while ($reg = $rspta->fetch_object()) {
          echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
        }
        break;
      case "selectColor":
        require_once "../modelos/Color.php";
        $color = new Color();

        $rspta = $color->select();

        while ($reg = $rspta->fetch_object()) {
          echo '<option  value=' . $reg->idcolor . '>' . $reg->nombre . '</option>';
        }
        break;
    }
    //Fin de las validaciones de acceso
  } else {
    require 'noacceso.php';
  }
}
ob_end_flush();
?>
