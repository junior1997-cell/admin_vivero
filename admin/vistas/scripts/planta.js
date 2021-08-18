var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	 
	//Cargamos los items al select categoria
	$.post("../ajax/planta.php?op=selectCategoria", function(r){
		$("#idcategoria").html(r);
		$('#idcategoria').selectpicker('refresh');

	});
	
	//Cargamos los items al select COLOR
	$.post("../ajax/planta.php?op=selectColor", function(r){
		$("#idcolor").html(r);
		$('#idcolor').selectpicker('refresh');

	});

	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lPlanta').addClass("active");

	$("#foto1_i").click(function() {
		$('#foto1').trigger('click');
	});
	$("#foto2_i").click(function() {
		$('#foto2').trigger('click');
	});
	$("#foto3_i").click(function() {
		$('#foto3').trigger('click');
	});

	$("#foto1").change(function(e) {
		addImage(e,$("#foto1").attr("id"));
	});
	$("#foto2").change(function(e) {
		addImage(e,$("#foto2").attr("id"))
	});
	$("#foto3").change(function(e) {
		addImage(e,$("#foto3").attr("id"));
	});

	// $('#idcolor').selectpicker('val', [1,3,4]); 
	$('select[name=idcolor]').val(1);
   $('select[name=idcolor]').change();
}





/* PREVISUALIZAR LAS IMAGENES */
function addImage(e,id) {
	console.log(id);
	var file = e.target.files[0], imageType = /image.webp/;
	
	if (e.target.files[0]) {
		var sizeByte = file.size;

		var sizekiloBytes = parseInt(sizeByte / 1024);
		var sizemegaBytes = (sizeByte / 1000000);
		// alert("KILO: "+sizekiloBytes+" MEGA: "+sizemegaBytes)

		if (!file.type.match(imageType)){
			// return;
			toastr.error('Este tipo de ARCHIVO no esta permitido <br> elija formato: <b>foto-ejemplo.webp </b>');
			$("#"+id+"_i").attr("src", "../public/img/default/img_defecto.png");
		}else{
			if (sizekiloBytes <= 2048) {
				var reader = new FileReader();
				reader.onload = fileOnload;
				function fileOnload(e) {
					var result = e.target.result;
					$("#"+id+"_i").attr("src", result);
					$("#"+id+"_nombre").html(''+
						'<div class="row">'+
                             '<div class="col-md-12">'+
							 file.name +
                             '</div>'+
                             '<div class="col-md-12">'+
                              '<button  class="btn btn-danger  btn-block" onclick="'+id+'_b();" style="padding:0px 12px 0px 12px !important;" type="button" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>'+
                             '</div>'+
                           '</div>'+
						'');
					toastr.success('Imagen aceptada.')
				}
				reader.readAsDataURL(file);
			} else {
				toastr.warning('La imagen: '+file.name.toUpperCase()+' es muy pesada')
				$("#"+id+"_i").attr("src", "../public/img/default/img_error.png");
				$("#"+id).val("");
				console.log(id);
			}
		}
	}else{
		toastr.error('Seleccione una Imagen');$("#"+id+"_i").attr("src", "../public/img/default/img_defecto.png");
		$("#"+id+"_nombre").html("");
	}	
	
}
// ----------
function foto1_b() {
	$("#foto1").val("");
	$("#foto1_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto1_nombre").html("");
}
function foto2_b() {
	$("#foto2").val("");
	$("#foto2_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto2_nombre").html("");
}
function foto3_b() {
	$("#foto3").val("");
	$("#foto3_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto3_nombre").html("");
}

//Función limpiar
function limpiar()
{
	$("#idplanta").val("");
	$("#nombre").val("");
	$("#idcategoria").val('default').selectpicker("refresh");
	$("#idcolor").val('default').selectpicker("refresh");
	$("#stock").val("");
	$("#precio_venta").val("");
	$("#nombre_cientifico").val("");
	$("#familia").val("");
	$("#apodo").val("");
	$("#descripcion").val("");
	
	
	$("#foto1_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto1").val("");
	$("#foto1_actual").val("");
	$("#foto2_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto2").val("");
	$("#foto2_actual").val("");
	$("#foto3_i").attr("src", "../public/img/default/img_defecto.png");
	$("#foto3").val("");
	$("#foto3_actual").val("");

	$("#foto1_nombre").html("");
	$("#foto2_nombre").html("");
	$("#foto3_nombre").html("");

	$("#codigo").val("");
	$("#print").hide();	
}

function eliminar_barcode() {
	$("#codigo").val("");
	$("#print").hide();
}
//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();

		$(document).ready(function() {	
			function changeColor() {
			  $('.cerrar_alerta_celeste').click();     
			}
			setInterval(changeColor, 9000);
		  });
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		
	}
	
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		responsive: true,
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/planta.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/planta.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	        //bootbox.alert(datos);
			if (datos == 'ok') {
				$("#btnGuardar").prop("disabled",true);
				toastr.success('Planta registrada correctamente')
				mostrarform(false);
	        	tabla.ajax.reload();
				limpiar();
			}else{
				toastr.error(datos)
			}	          
	        
	    }

	});
	
}

function mostrar(idplanta)
{
	limpiar();

	$.post("../ajax/planta.php?op=mostrar",{idplanta : idplanta}, function(data, status)
	{
		data = JSON.parse(data);
		// console.log(data); 		
		mostrarform(true);
		 
		$("#idplanta").val(data.idplanta);
		$("#nombre").val(data.nombre);
		$("#idcategoria").val(data.id_categoria);		
		$('#idcategoria').selectpicker('refresh');
		
		$("#stock").val(data.stock);
		$("#precio_venta").val(data.precio_venta);
		$("#nombre_cientifico").val(data.nombre_cientifico);
		$("#familia").val(data.familia);
		$("#apodo").val(data.apodo);
		$("#descripcion").val(data.descripcion);

		$("#codigo").val(data.codigo);
		if (data.codigo == "") {
			generarbarcode();
		}
		// Imagenes---
		if (data.img_1 != "") {
			$("#foto1_i").attr("src", "../files/articulos/" + data.img_1);
			$("#foto1_actual").val(data.img_1);
			console.log(data.img_1);
		} 
		if (data.img_2 != "") {
			$("#foto2_i").attr("src", "../files/articulos/" + data.img_2);
			$("#foto2_actual").val(data.img_2);
			console.log(data.img_2);
		} 
		if (data.img_3 != "") {
			$("#foto3_i").attr("src", "../files/articulos/" + data.img_3);
			$("#foto3_actual").val(data.img_3);
			console.log(data.img_3);
		} 
 	});
	
	// $.post("../ajax/articulo.php?op=mostrar_img&id_planta="+idplanta, function(data, status)
	// {
	// 	data = JSON.parse(data);

	// 	$.each(data, function (index, value) {
			
	// 	});
 	// });

	$.post("../ajax/planta.php?op=mostrar_color&id_planta="+idplanta, function(data, status)
	{
		data = JSON.parse(data);
		// console.log(data);
		$('#idcolor').selectpicker('val', data );
		
 	});
}

//Función para desactivar registros
function desactivar(idplanta)
{
	console.log(idplanta);
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/planta.php?op=desactivar", {idplanta : idplanta}, function(e){
        		if (e == 'ok') {
					toastr.success('Planta Desactivada correctamente')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}
	            
        	});	
        }
	})
}

//Función para activar registros
function activar(idplanta)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/planta.php?op=activar", {idplanta : idplanta}, function(e){
        		if (e == 'ok') {
					toastr.success('Planta Activada correctamente')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}
        	});	
        }
	})
}

//función para generar el código de barras
function generarbarcode()
{
	codigo=$("#codigo").val();
	JsBarcode("#barcode", codigo);
	$("#print").show();
}

//Función para imprimir el Código de barras
function imprimir()
{
	$("#print").printArea();
}

init();