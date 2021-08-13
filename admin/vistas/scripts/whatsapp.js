var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
    // $('#mAlmacen').addClass("treeview active");
    $('#lWhatsapp').addClass("active");

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 30
    });
}

$('#color_hex').focusout(function() {
	var x = $(this).val();
   
	// Recomiendo usar la consola en lugar de alerts
	console.log(x);
});

//Función limpiar
function limpiar()
{
	$("#idwhatsapp").val("");
	$("#numero").val("");
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
					url: '../ajax/whatsapp.php?op=listar',
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
	// $("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/whatsapp.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {
			if (datos == 'ok') {
				$("#btnGuardar").prop("disabled",true);
				toastr.success('Accion ejecutada correctamente.')
				mostrarform(false);
	        	tabla.ajax.reload();
				limpiar();
			}else{
				toastr.error(datos)
			}	 
	    	 
	    }

	});
	// limpiar();
}

function mostrar(idwhatsapp)
{
	$.post("../ajax/whatsapp.php?op=mostrar",{idwhatsapp : idwhatsapp}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#numero").val(data.numero);
 		$("#idwhatsapp").val(data.idwhatsapp);

 	})
}

//Función para desactivar registros
function desactivar(idwhatsapp)
{
	bootbox.confirm("¿Está Seguro de <span class='label bg-red'>Desactivar</span> el numero?", function(result){
		if(result)
        {
        	$.post("../ajax/whatsapp.php?op=desactivar", {idwhatsapp : idwhatsapp}, function(e){
        		// bootbox.alert(e);
        		 
				if (e == 'ok') {
					toastr.warning('Numero desactivado correctamente.')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}	
        	});	
        }
	})
}

//Función para activar registros
function activar(idwhatsapp)
{
	bootbox.confirm("¿Está Seguro de <span class='label bg-green'>Activar</span> el numero?", function(result){
		if(result)
        {
        	$.post("../ajax/whatsapp.php?op=activar", {idwhatsapp : idwhatsapp}, function(e){
        		// bootbox.alert(e);
				if (e == 'ok') {
					toastr.success('Numero activado correctamente.')
					tabla.ajax.reload();
				}else{
					toastr.error(e)
				}
        	});	
        }
	})
}


init();