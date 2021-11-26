<?php 
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
if (!isset($_SESSION["nombre"])){
  header("Location: ../vistas/login.html");//Validamos el acceso solo a los usuarios logueados al sistema.
}else{
	//Validamos el acceso solo al usuario logueado y autorizado.
	if ($_SESSION['ventas']==1)
	{
		require_once "../modelos/Venta.php";

		$venta=new Venta();

		$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
		$idcliente=isset($_POST["idcliente"])? limpiarCadena($_POST["idcliente"]):"";
		$idusuario=$_SESSION["idusuario"];
		$tipo_comprobante=isset($_POST["tipo_comprobante"])? limpiarCadena($_POST["tipo_comprobante"]):"";
		$serie_comprobante=isset($_POST["serie_comprobante"])? limpiarCadena($_POST["serie_comprobante"]):"";
		$num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
		$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
		$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
		$total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";

		switch ($_GET["op"]){
			case 'guardaryeditar':
				if (empty($idventa)){
					$rspta=$venta->insertar($idcliente,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_venta,$_POST["idarticulo"],$_POST["cantidad"],$_POST["stock_antg"],$_POST["precio_venta"],$_POST["descuento"]);
					echo $rspta ? "ok" : "No se pudieron registrar todos los datos de la venta";
				}
				else {
				}
			break;

			case 'anular':
				$rspta=$venta->anular($idventa);
				echo $rspta ? "ok" : "Venta no se puede anular";
			break;

			case 'mostrar':
				$rspta=$venta->mostrar($idventa);
				//Codificar el resultado utilizando json
				echo json_encode($rspta);
			break;

			case 'listarDetalle':
				//Recibimos el idingreso
				$id=$_GET['id'];

				$rspta = $venta->listarDetalle($id);
				$total=0;
				echo '<thead style="background-color:#A9D0F5">
											<th>Opciones</th>
											<th>Artículo</th>
											<th>Cantidad</th>
											<th>Precio Venta</th>
											<th>Descuento</th>
											<th>Subtotal</th>
										</thead>';

				while ($reg = $rspta->fetch_object())
						{
							echo '<tr class="filas">
                      <td></td>
                      <td>'.$reg->nombre.'</td>
                      <td>'.$reg->cantidad.'</td>
                      <td>'.$reg->precio_venta.'</td>
                      <td>'.$reg->descuento.'</td>
                      <td>'.$reg->subtotal.'</td></tr>';
							        $total=$total+($reg->precio_venta*$reg->cantidad-$reg->descuento);
						}
				echo '<tfoot>
											<th>TOTAL</th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th> 
										</tfoot>';
			break;

			case 'listar':
				$rspta=$venta->listar();
				//Vamos a declarar un array
				$data= Array();

				while ($reg=$rspta->fetch_object()){
					if($reg->tipo_comprobante=='Ticket'){
						$url='../reportes/exTicket.php?id=';
					}
					else{
						$url='../reportes/exFactura.php?id=';
					}

					$data[]=array(
						"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')" data-toggle="tooltip" data-original-title="Ver detalle"><i class="fa fa-eye"></i></button>'.
							' <button class="btn btn-danger" onclick="anular('.$reg->idventa.')" data-toggle="tooltip" data-original-title="Anular venta"><i class="fa fa-close"></i></button>':
							'<button class="btn btn-warning" onclick="mostrar('.$reg->idventa.')"data-toggle="tooltip" data-original-title="Ver detalle"><i class="fa fa-eye"></i></button>').
							'<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-primary"> <i class="fa
   							fa-file"></i></button></a>',
							
						"1"=>$reg->fecha,
						"2"=>$reg->cliente,
						"3"=>$reg->usuario,
						"4"=>$reg->tipo_comprobante,
						"5"=>$reg->serie_comprobante.'-'.$reg->num_comprobante,
						"6"=>$reg->total_venta,
						"7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':
						'<span class="label bg-red">Anulado</span>'
						);
				}
				$results = array(
					"sEcho"=>1, //Información para el datatables
					"iTotalRecords"=>count($data), //enviamos el total registros al datatable
					"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
					"aaData"=>$data);
				echo json_encode($results);

			break;

			case 'selectCliente':
				require_once "../modelos/Persona.php";
				$persona = new Persona();

				$rspta = $persona->listarC();

				while ($reg = $rspta->fetch_object())
						{
						echo '<option value=' . $reg->idpersona . '>' . $reg->nombre .' - '.$reg->num_documento . '</option>';
						}
			break;

			case 'listarArticulosVenta':
				require_once "../modelos/Articulo.php";
				$planta=new Articulo();

				$rspta = $planta->listarActivosVenta();
				//Vamos a declarar un array
				$datas= Array();
				// echo json_encode($rspta);
        $img = "";
        $color_stock ="";
				while ( $reg = $rspta->fetch_object() ){
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
          if ($reg->stock <= 3 ) {
            $color_stock = '<div class="text-center"> <small class="label label-danger">'.$reg->stock.'</small> </div>';
          } else {
            if ($reg->stock >= 3 && $reg->stock <= 6 ) {
              $color_stock = '<div class="text-center"> <small class="label label-warning">'.$reg->stock.'</small> </div>';
            }else{
              $color_stock = '<div class="text-center"> <small class="label label-success">'.$reg->stock.'</small> </div>';
            }
          }
          
					$datas[]=array(
						"0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idplanta.',\''.$reg->nombre.'\',\''.$reg->precio_venta.'\',\''.$reg->nombre.'\',\''.$reg->stock.'\',\''.$img.'\')" data-toggle="tooltip" data-original-title="Agregar Planta"><span class="fa fa-plus"></span></button>',
						"1"=>'<div class="user-block">
								<img class="profile-user-img img-responsive img-circle" src="../files/articulos/'.$img.'" alt="user image">
								<span class="username"><p style="margin-bottom: 0px !important;">'.$reg->nombre.'</p></span>
								<span class="description">...</span>
							</div>',
						"2"=>$reg->categoria,
						"3"=>$color_stock, 
						"4"=>$reg->precio_venta
						);
				}
				$results = array(
					"sEcho"=>1, //Información para el datatables
					"iTotalRecords"=>count($datas), //enviamos el total registros al datatable
					"iTotalDisplayRecords"=>count($datas), //enviamos el total registros a visualizar
					"aaData"=>$datas
				);
				echo json_encode($results);
			break;
      
      
		}
	//Fin de las validaciones de acceso
	}else{
		require 'noacceso.php';
	}
}
function recortarTexto($texto, $limite=100){
  $texto = trim($texto);
  $texto = strip_tags($texto);
  $tamano = strlen($texto);
  $resultado = '';
  if($tamano <= $limite){
      return $texto;
  }else{
      $texto = substr($texto, 0, $limite);
      $palabras = explode(' ', $texto);
      $resultado = implode(' ', $palabras);
      $resultado .= '...';
  }
  return $resultado;
}
ob_end_flush();
?>