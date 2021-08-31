var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e){ guardaryeditar(e); });
    $('#mPlanta').addClass("treeview active");
    $('#lComentarios').addClass("active");

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 30
    });
}

//Función limpiar
function limpiar()
{
	$("#idcolor").val("");
	$("#nombre").val("");
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
					url: '../ajax/comentarios.php?op=listar',
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
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/comentarios.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    { 
	    	toastr.success(datos)                   
	        // bootbox.alert(datos);	          
	        mostrarform(false);
	        tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idcolor)
{
	$.post("../ajax/comentarios.php?op=mostrar",{idcolor : idcolor}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
 		$("#idcolor").val(data.idcolor);

 	})
}

//Función para desactivar registros
function desactivar(idcolor)
{
	bootbox.confirm("<div class='font-weight-bolder'> ¿Está Seguro de <span class='label bg-red'>Desactivar</span> el comentario? </div> <div class=''>El comentario se ocultara de la página, y no sera visible hasta que lo actives.</div>", function(result){
		if(result)
        {
        	$.post("../ajax/comentarios.php?op=desactivar", {idcolor : idcolor}, function(e){
        		// bootbox.alert(e);
        		toastr.warning(e)        		
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcolor)
{
	bootbox.confirm("<div class='font-weight-bolder'> ¿Está Seguro de <span class='label bg-green'>Activar</span> el comentario? </div> <div class=''>El comentario se será visible en la página web</div>", function(result){
		if(result)
        {
        	$.post("../ajax/comentarios.php?op=activar", {idcolor : idcolor}, function(e){
        		// bootbox.alert(e);
       			toastr.success(e)
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();