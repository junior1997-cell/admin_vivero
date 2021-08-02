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
	$.post("../ajax/articulo.php?op=selectCategoria", function(r){
		$("#idcategoria").html(r);
		$('#idcategoria').selectpicker('refresh');

	});
	
	//Cargamos los items al select COLOR
	$.post("../ajax/articulo.php?op=selectColor", function(r){
		$("#idcolor").html(r);
		$('#idcolor').selectpicker('refresh');

	});

	$("#imagenmuestra").hide();
	$('#mAlmacen').addClass("treeview active");
    $('#lArticulos').addClass("active");

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
	var file = e.target.files[0], imageType = /image.*/;
	var sizeByte = file.size;

	var sizekiloBytes = parseInt(sizeByte / 1024);
	var sizemegaBytes = (sizeByte / 1000000);
	// alert("KILO: "+sizekiloBytes+" MEGA: "+sizemegaBytes)
	if (!file.type.match(imageType)){
		// return;
		toastr.error('Este tipo de ARCHIVO no esta permitido');
		$("#"+id+"_i").attr("src", "../public/img/default/img_defecto.png");
	}else{
		if (sizekiloBytes <= 2048) {
			var reader = new FileReader();
			reader.onload = fileOnload;
			function fileOnload(e) {
				var result = e.target.result;
				$("#"+id+"_i").attr("src", result);
				$("#"+id+"_nombre").html(file.name);
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
	
}
// ----------

//Función limpiar
function limpiar()
{
	$("#codigo").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#stock").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#print").hide();
	$("#idarticulo").val("");
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
					url: '../ajax/articulo.php?op=listar',
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
		url: "../ajax/articulo.php?op=guardaryeditar",
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

function mostrar(idarticulo)
{
	$.post("../ajax/articulo.php?op=mostrar",{idarticulo : idarticulo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcategoria").val(data.idcategoria);
		$('#idcategoria').selectpicker('refresh');
		$("#codigo").val(data.codigo);
		$("#nombre").val(data.nombre);
		$("#stock").val(data.stock);
		$("#descripcion").val(data.descripcion);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/articulos/"+data.imagen);
		$("#imagenactual").val(data.imagen);
 		$("#idarticulo").val(data.idarticulo);
 		generarbarcode();

 	})
}

//Función para desactivar registros
function desactivar(idarticulo)
{
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/articulo.php?op=desactivar", {idarticulo : idarticulo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idarticulo)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/articulo.php?op=activar", {idarticulo : idarticulo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
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