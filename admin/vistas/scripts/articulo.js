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
}
var arrayfile = [];
$("div.imagen_dropzone").dropzone({ 
	url: "../ajax/articulo.php",
	addRemoveLinks: true,
	// acceptedFiles: ".webp",
	maxFilesize: 1,
	thumbnailWidth: 314, //I want to change width to 100% instead
    thumbnailHeight: 314,
	init: function () {

		this.on("addedfile", function (file) {
			arrayfile.push(file);
			console.log("archivos",arrayfile);
		}),
		this.on("removedfile", function (file) {
			var index = arrayfile.indexOf(file);
			arrayfile.splice(index,1);
			console.log("archivos",arrayfile);
		}),

		this.on("thumbnail", function (file) {
			if (file.height < 5 && file.width < 5) {
				alert("Tamaño máximo de imagen permitido es 5 x 5 ");
			}
		}),

		this.on("error", function (file, message) {
			toastr.error("("+file.name.toUpperCase()+") no cumple con requisitos")
			this.removeFile(file);
		}),

		this.on("dragover", function(file) {
			toastr.info("Suelte el archivo")
		})
	}
});

// ----------------------
var puedeLeerArchivos;
// Check for the various File API support.
if (window.File && window.FileReader && window.FileList && window.Blob) {
  // Great success! All the File APIs are supported.
  puedeLeerArchivos =true;
} else {
  alert('The File APIs are not fully supported in this browser.');
  puedeLeerArchivos =false;
}

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var output = [];
    var fileData = new FormData();
    fileData.append("cotizacion", 1200);
    for (var i = 0, f; f = files[i]; i++) {
     var file = f;
        // debugger;
        fileData.append("Document", f);
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate.toLocaleDateString(), '</li>');
    }
    
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
// ----------------------

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