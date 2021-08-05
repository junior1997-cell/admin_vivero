var tabla;
function innit() {
mostrarform(false);

  $("#btn_add_carrucel").click(function() {
      $("#add_carrucel").modal("show");

  });

  $("#btn_close_carrucel").click(function() {
      $("#add_carrucel").modal("hide");
      limpiar();
  });

  $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });

  $("#img_i").click(function() {
    $('#img').trigger('click');
  });


  $("#img").change(function(e) {
    addImage(e,$("#img").attr("id"));
  });

  listar()
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function limpiar(){
  $("#idcarrucel").val("");
  $("#nombre").val("");

  $("#img_i").attr("src", "admin/images/img_defecto.png");
  $("#img").val("");
  $("#img_actual").val("");

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


function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/carrucel.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,


	    success: function(datos)
	    { 
	    	if (datos=='ok') {
	    		toastr.success('imagen registrada')                   
	        // bootbox.alert(datos);	          
	        mostrarform(false);
	        tabla.ajax.reload();

	    	}else{
	    		toastr.error(datos);
	    	}
	    	
	    }

	});
	limpiar();
}


/* PREVISUALIZAR LAS IMAGENES */
function addImage(e,id) {
  var file = e.target.files[0],
    imageType = /image.*/;
  var sizeByte = file.size;

  var sizekiloBytes = parseInt(sizeByte / 1024);
  var sizemegaBytes = (sizeByte / 1000000);
  //alert("KILO"+sizekiloBytes+"MEGA"+sizemegaBytes)
  if (!file.type.match(imageType))
    return;
  if (sizekiloBytes < 90000) {
    var reader = new FileReader();
    reader.onload = fileOnload;
    function fileOnload(e) {
      var result = e.target.result;
      $("#"+id+"_i").attr("src", result);
    }
    reader.readAsDataURL(file);
  } else {
    $("#"+id+"_i").attr("src", "admin/images/img_error.png");
    $("#"+id).val("");
  }
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
					url: '../ajax/carrucel.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : MENU registros",
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


/*MOSTAR UNA NOTICIA/COMENTARIO*/
function mostrar(idcarrucel)
{
	$.post("../ajax/carrucel.php?op=mostrar",{idcarrucel : idcarrucel}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
 		$("#idcarrucel").val(data.idcarrucel);
 		$("#img_actual").val(data.img);

 		if (data.img == "") {
      $("#img_i").attr("src", "../public/img/default/img_defecto.png");
    } else {
      $("#img_i").attr("src", "../files/carrucel/" + data.img);
    }

 	})
}



//Función para activar registros
function activar(idcarrucel)
{
	bootbox.confirm("¿Está Seguro de activar el Artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/carrucel.php?op=activar", {idcarrucel : idcarrucel}, function(e){
        		if (e == 'ok') {
					toastr.success('Imagen Activada correctamente')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}
        	});	
        }
	})
}

//Función para desactivar registros
function desactivar(idcarrucel)
{
	console.log(idcarrucel);
	bootbox.confirm("¿Está Seguro de desactivar el artículo?", function(result){
		if(result)
        {
        	$.post("../ajax/carrucel.php?op=desactivar", {idcarrucel : idcarrucel}, function(e){
        		if (e == 'ok') {
					toastr.success('Imagen Desactivada correctamente')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}
	            
        	});	
        }
	})
}


innit();
