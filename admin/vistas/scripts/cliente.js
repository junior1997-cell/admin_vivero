var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e){ guardaryeditar(e); });
	$('#mVentas').addClass("treeview active");
    $('#lClientes').addClass("active");
    ocultar_inputs();
    
}
 
function ocultar_inputs() {
    var tipo_doc = document.querySelector("#tipo_documento").value;
    if (tipo_doc == "RUC") {
        console.log(tipo_doc);
        $("#ocultar_nombre_comercial").show();
        $("#label_nombre").html("Razon Social");
        $(".cambiar").removeClass("col-md-6 col-lg-6").addClass("col-md-4 col-lg-4");
        $("#nombre").attr("placeholder", "Razon Social del cliente");
    } else {
        console.log(tipo_doc);
        $("#ocultar_nombre_comercial").hide();
        $("#label_nombre").html("Nombres y Apellidos");
        $(".cambiar").removeClass("col-md-4 col-lg-4").addClass("col-md-6 col-lg-6");  
        $("#nombre").attr("placeholder", "Nombres y Apellidos");    
    }
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#num_documento").val("");

    $("#tipo_documento").val("DNI");
    $("#tipo_documento").selectpicker('refresh');

    $("#tipo_cliente").val("");
    $("#tipo_cliente").selectpicker('deselectAll');
    $("#tipo_cliente").selectpicker('refresh');

	$("#direccion").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#idpersona").val("");
    
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
					url: '../ajax/persona.php?op=listarc',
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
		url: "../ajax/persona.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    { 
            console.log(datos);
        if (datos == "ok") {
          // bootbox.alert(datos);	          
          mostrarform(false);
          toastr.success('Cliente Registrado Correctamente')
          tabla.ajax.reload();
        } else {
          toastr.error(datos)
        }                   
	          
	    }

	});
}

function mostrar(idpersona)
{
	$.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
        $("#tipo_cliente").val(data.tipo_cliente);
        $("#tipo_cliente").selectpicker('refresh');
		$("#tipo_documento").val(data.tipo_documento);
		$("#tipo_documento").selectpicker('refresh');
		$("#num_documento").val(data.num_documento);
		$("#direccion").val(data.direccion);
        $("#nacimiento").val(data.nacimiento);
        
		$("#telefono").val(data.telefono);
		$("#email").val(data.email);
 		$("#idpersona").val(data.idpersona);

        edades();

 	})
}

//Función para eliminar registros
function eliminar(idpersona){
	bootbox.confirm("¿Está Seguro de eliminar el cliente?", function(result){
		if(result){
      $.post("../ajax/persona.php?op=eliminar", {idpersona : idpersona}, function(e){
        if (e == "ok") {
          // bootbox.alert(e);
          toastr.warning('Cliente eliminado')
          tabla.ajax.reload();
        } else {
          toastr.error(e)
        }
        
      });	
    }
	})
}

function buscar_sunat_reniec() {
    console.log("busca");
    $('#search').hide();

    $('#charge').show();

    let tipo_doc = $("#tipo_documento").val();

    let dni_ruc = $("#num_documento").val();

    if (tipo_doc == 'DNI') {

        $('#tipo_doc').removeClass('is-invalid');

        if (dni_ruc.length == '8') {

            $.post("../ajax/persona.php?op=reniec", { dni: dni_ruc }, function (data, status) {
                
                data = JSON.parse(data);
                console.log(data);
                if (data.success == false) {

                    $('#search').show();

                    $('#charge').hide();
                    
                    toastr.error('Es probable que el sistema de busqueda esta en mantenimiento o los datos no existe en la RENIEC!!!');

                } else {
                    
                    $('#search').show();

                    $('#charge').hide();

                    $("#nombre").val(data.nombres);

                    $("#apellidos_nombre_comercial").val(data.apellidoMaterno + ' ' + data.apellidoPaterno);
                    toastr.success('Cliente encontrado!!!!');
                }
            })
        } else {

            $('#search').show();

            $('#charge').hide();

            toastr.info('Asegurese de que el DNI tenga 8 dígitos!!!');
        }

    } else {

        if (tipo_doc == 'RUC') {

            $('#tipo_doc').removeClass('is-invalid');

            if (dni_ruc.length == '11') {

                $.post("../ajax/persona.php?op=sunat", { ruc: dni_ruc }, function (data, status) {
                     
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.success == false) {

                        $('#search').show();

                        $('#charge').hide();

                        toastr.error('Datos no encontrados en la SUNAT!!!');
                    } else {

                        if (data.estado == 'ACTIVO') {

                            $('#search').show();

                            $('#charge').hide();

                            $("#nombre").val(data.razonSocial);

                            data.nombreComercial == null ? $("#apellidos_nombre_comercial").val('-') : $("#apellidos_nombre_comercial").val(data.nombreComercial);
                            data.direccion == null ? $("#direccion").val('-') : $("#direccion").val(data.direccion);
                            // $("#direccion").val(data.direccion);
                            toastr.success('Cliente encontrado');
                        } else {

                            toastr.info('Se recomienda no generar BOLETAS o Facturas!!!');

                            $('#search').show();

                            $('#charge').hide();

                            $("#nombre").val(data.razonSocial);

                            data.nombreComercial == null ? $("#apellidos_nombre_comercial").val('-') : $("#apellidos_nombre_comercial").val(data.nombreComercial);
                            data.direccion == null ? $("#direccion").val('-') : $("#direccion").val(data.direccion);

                            // $("#direccion").val(data.direccion);
                        }
                    }
                })
            } else {

                $('#search').show();

                $('#charge').hide();

                toastr.info('Asegurese de que el RUC tenga 11 dígitos!!!');
            }
        } else {
            if (tipo_doc == 'CEDULA' || tipo_doc == 'OTRO' ) {

                $('#search').show();

                $('#charge').hide();

                toastr.info('No necesita hacer consulta');
            } else {

                $('#tipo_doc').addClass('is-invalid');

                $('#search').show();

                $('#charge').hide();

                toastr.error('Selecione un tipo de documento');
            }
        }
    }
}


/*Validación Fecha de Nacimiento Mayoria de edad del usuario*/
function edades() {
    var fechaUsuario = $("#nacimiento").val();
    if (fechaUsuario) {         
    
        //El siguiente fragmento de codigo lo uso para igualar la fecha de nacimiento con la fecha de hoy del usuario
        let d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
        d=[year, month, day].join('-')
        /*------------*/
        var hoy = new Date(d);//fecha del sistema con el mismo formato que "fechaUsuario"
        var cumpleanos = new Date(fechaUsuario);
        //alert(cumpleanos+" "+hoy);
        //Calculamos años
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        // calculamos los meses
        var meses=0;
        if(hoy.getMonth()>cumpleanos.getMonth()){
            meses=hoy.getMonth()-cumpleanos.getMonth();
        }else if(hoy.getMonth()<cumpleanos.getMonth()){
            meses=12-(cumpleanos.getMonth()-hoy.getMonth());
        }else if(hoy.getMonth()==cumpleanos.getMonth() && hoy.getDate()>cumpleanos.getDate() ){
            if(hoy.getMonth()-cumpleanos.getMonth()==0){
                meses=0;
            }else{
                meses=11;
            }            
        }
        // Obtener días: día actual - día de cumpleaños
        let dias  = hoy.getDate() - cumpleanos.getDate();
        if(dias < 0) {
            // Si días es negativo, día actual es mayor al de cumpleaños,
            // hay que restar 1 mes, si resulta menor que cero, poner en 11
            meses = (meses - 1 < 0) ? 11 : meses - 1;
            // Y obtener días faltantes
            dias = 30 + dias;
        }
        // console.log(`Tu edad es de ${edad} años, ${meses} meses, ${dias} días`);
        $("#edad").val(edad);
        $("#p_edad").html(`${edad} años, ${meses}meses y ${dias}días`);
        // calcular mayor de 18 años
        if(edad>=18){
            console.log("Eres un adulto");
        }else{
            // Calcular faltante con base en edad actual
            // 18 menos años actuales
            let edadF = 18 - edad;
            // El mes solo puede ser 0 a 11, se debe restar (mes actual + 1)
            let mesesF = 12 - (meses + 1);
            // Si el mes es mayor que cero, se debe restar 1 año
            if(mesesF > 0) {
                edadF --;
            }
            let diasF = 30 - dias;
            // console.log(`Te faltan ${edadF} años, ${mesesF} meses, ${diasF} días para ser adulto`);
        }
    } else {
        $("#edad").val("");
        $("#p_edad").html(`0 años, 0 meses y 0 días`); 
    }
}

init();

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("nacimiento").setAttribute("max", today);

function validacion_form() {
    if ($('#nombre').val() == '' || $('#tipo_documento').val() == '' ) {
        $('.validar_nombre').addClass('has-error');
        console.log("vacio");
        return false;
    }else{
        $('.validar_nombre').removeClass('has-error');
        console.log("no vacio");
        return true;
    }

}

