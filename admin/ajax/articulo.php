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
require_once "../modelos/Articulo.php";

$articulo=new Articulo();

$idarticulo		=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$id_categoria	=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$id_color		=isset($_POST["idcolor"])? $_POST["idcolor"]:"";
$nombre			=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$stock			=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";
$nombre_cientifico=isset($_POST["nombre_cientifico"])? limpiarCadena($_POST["nombre_cientifico"]):"";
$familia		=isset($_POST["familia"])? limpiarCadena($_POST["familia"]):"";
$apodo			=isset($_POST["apodo"])? limpiarCadena($_POST["apodo"]):"";
$descripcion	=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$img			=isset($_POST["files"])? limpiarCadena($_POST["files"]):"";
$codigo			=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		$array_foto = [];
		if (!file_exists($_FILES['files']['tmp_name'][0]) || !is_uploaded_file($_FILES['files']['tmp_name'][0]))
		{
			$img="";
		}
		else 
		{
			//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
			foreach($_FILES["files"]['tmp_name'] as $key => $tmp_name)
			{
				//Validamos que el archivo exista
				if($_FILES["files"]["name"][$key]) {
					// extraemos el nombre del array
					$extencion = explode(".", $_FILES["files"]["name"][$key]);
					// cambiamos el nombre del archivo
					$filename = hash("MD2",$_FILES["files"]["name"][$key]). '.' . end($extencion); //Obtenemos el nombre original del archivo
					
					$source = $_FILES["files"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
					
					$directorio = '../files/articulos'; //Declaramos un  variable con la ruta donde guardaremos los archivos
					
					//Validamos si la ruta de destino existe, en caso de no existir la creamos
					if(!file_exists($directorio)){
						mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
					}
					
					// agregamos los nombre de las fotos al ARRAY
					array_push($array_foto,$filename);

					$dir=opendir($directorio); //Abrimos el directorio de destino
					$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
					
					//Movemos y validamos que el archivo se haya cargado correctamente
					//El primer campo es el origen y el segundo el destino
					 
					move_uploaded_file($source, $target_path);
					 
					closedir($dir); //Cerramos el directorio de destino
				}
			}
		}
		if (empty($idarticulo)){
			$rspta=$articulo->insertar($id_categoria, $id_color, $nombre, $stock, $nombre_cientifico, $familia, $apodo, $descripcion, $array_foto);
			echo $rspta ? "ok" : "Planta: ".strtoupper($nombre)." no se pudo registrar";
		}
		else {
			$rspta=$articulo->editar($idarticulo,$idcategoria,$codigo,$nombre,$stock,$descripcion,$img);
			echo $rspta ? "Artículo actualizado" : "Artículo no se pudo actualizar";
		}
		 

	break;

	case 'desactivar':
		$rspta=$articulo->desactivar($idarticulo);
 		echo $rspta ? "Artículo Desactivado" : "Artículo no se puede desactivar";
	break;

	case 'activar':
		$rspta=$articulo->activar($idarticulo);
 		echo $rspta ? "Artículo activado" : "Artículo no se puede activar";
	break;

	case 'mostrar':
		$rspta=$articulo->mostrar($idarticulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$articulo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idplanta.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idplanta.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idplanta.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idplanta.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->categoria,
 				"3"=>$reg->familia,
 				"4"=>$reg->stock,
 				"5"=>"<img src='../files/articulos/".$reg->img."' height='50px' width='50px' >",
 				"6"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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

	case "selectCategoria":
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();

		$rspta = $categoria->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
				}
	break;
	case "selectColor":
		require_once "../modelos/Color.php";
		$color = new Color();

		$rspta = $color->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcolor . '>' . $reg->nombre . '</option>';
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