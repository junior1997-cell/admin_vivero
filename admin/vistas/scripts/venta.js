var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
  fecha_actual();
	$("#formulario_venta").on("submit",function(e)
	{
		guardaryeditar_venta(e);	
	});

	$("#formulario_cliente").on("submit",function(e)
	{
		guardaryeditar_cliente(e);	
    localStorage.setItem("titulo", "Curso de Angular avanzado - Víctor Robles");
	});

	//Cargamos los items al select cliente
	$.post("../ajax/venta.php?op=selectCliente", function(r){
    $("#idcliente").html(r);
    $('#idcliente').selectpicker('refresh');
	});
	$('#mVentas').addClass("treeview active");
    $('#lVentas').addClass("active");
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
	$("#idcliente").val("");
	$("#cliente").val("");
  $("#idcliente").val("").selectpicker("refresh");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#impuesto").val("0");

	$("#total_venta").val("");
	$(".filas").remove();
	$("#total").html("0");	

  //Marcamos el primer tipo_documento
  $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}

//Función limpiar cliente
function limpiar_cliente()
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

function fecha_actual() {
  //Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
  $('#fecha_hora').val(today);
}
//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar_venta").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar_venta").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		detalles=0;
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
					url: '../ajax/venta.php?op=listar',
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


//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tblarticulos').dataTable(
	{
		responsive: true,
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listarArticulosVenta',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar_venta(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar_venta").prop("disabled",true);
	var formData = new FormData($("#formulario_venta")[0]);

	$.ajax({
		url: "../ajax/venta.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    { 
        if (datos == "ok") {
          // bootbox.alert(datos);
          toastr.success('Venta registrada correctamente')	          
          mostrarform(false);
          listar();
        } else {
          toastr.error(datos)
        }                   
        
	    }

	});
	limpiar();
}
// cliente
function guardaryeditar_cliente(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	 
	var formData = new FormData($("#formulario_cliente")[0]);

	$.ajax({
		url: "../ajax/persona.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {  
			if (datos == 'ok') {                  
				//   bootbox.alert(datos);	          
				toastr.success('Cliente Registrado Correctamente')
				$('#agregar_cliente').modal('hide');
				
				//Cargamos los items al select cliente
				$.post("../ajax/venta.php?op=selectCliente", function(r){
					$("#idcliente").html(r);
					$('#idcliente').selectpicker('refresh');
				});
				//$("#idcategoria").val('default').selectpicker("refresh");
				limpiar_cliente();
			}else{
				toastr.error(datos)
			}
	    }

	});
}

function mostrar(idventa)
{
	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcliente").val(data.idcliente);
		$("#idcliente").selectpicker('refresh');
		$("#tipo_comprobante").val(data.tipo_comprobante);
		$("#tipo_comprobante").selectpicker('refresh');
		$("#serie_comprobante").val(data.serie_comprobante);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#impuesto").val(data.impuesto);
		$("#idventa").val(data.idventa);

		//Ocultar y mostrar los botones
		$("#btnGuardar_venta").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
 	});

 	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
	        $("#detalles").html(r);
	});	
}

//Función para anular registros
function anular(idventa)
{
	bootbox.confirm("¿Está Seguro de anular la venta?", function(result){
		if(result){
      $.post("../ajax/venta.php?op=anular", {idventa : idventa}, function(e){
        if (e = "ok") {
          // bootbox.alert(e);
          tabla.ajax.reload();
          toastr.success('Venta anulada correctamente')
        } else {
          toastr.error(datos)
        }
        
      });	
    }
	})
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var impuesto=18;
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar_venta").hide();
$("#tipo_comprobante").change(marcarImpuesto);

function marcarImpuesto()
  {
  	var tipo_comprobante=$("#tipo_comprobante option:selected").text();
  	if (tipo_comprobante=='Factura')
    {
        $("#impuesto").val(impuesto); 
    }
    else
    {
        $("#impuesto").val("0"); 
    }
  }

function agregarDetalle(idarticulo,articulo,precio_venta,nombre, stock,img) {
  	var cantidad=1;
    var descuento=0;

    if (idarticulo!="")
    {
      if (stock != 0) {
        // $('.producto_'+idarticulo).addClass('producto_selecionado');
        if ( $('.producto_'+idarticulo).hasClass('producto_selecionado') ) {

          toastr.success('Planta: '+nombre+ ' agregada !!');
          var cant_producto = $('.producto_'+idarticulo).val();
          var sub_total = parseInt(cant_producto,10) + 1;
          $('.producto_'+idarticulo).val(sub_total );
          modificarSubototales();
        } else {          
        
          var subtotal=cantidad*precio_venta;
          var color_stock = "";
          if (stock <= 3 ) {
             color_stock = '<small class="label label-danger">'+stock+'</small>';
          } else {
            if (stock >= 3 && stock <= 6 ) {
               color_stock = '<small class="label label-warning">'+stock+'</small>';
            }else{
               color_stock = '<small class="label label-success">'+stock+'</small>';
            }
          }
          var fila='<tr class="filas" id="fila'+cont+'">'+
          '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
          '<td>'+
            '<input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+
            '<div class="user-block">'+
              '<img class="profile-user-img img-responsive img-circle" src="../files/articulos/'+img+'" alt="user image">'+
              '<span class="username"><p style="margin-bottom: 0px !important;">'+articulo+'</p></span>'+
              '<span class="description">Stock actual: '+color_stock+' </span>'+
            '</div>'+
          '</td>'+
          '<td><input onkeyup="modificarSubototales()" onchange="modificarSubototales()" class="producto_'+idarticulo+' producto_selecionado" type="number" name="cantidad[]" id="cantidad[]" min="1" max="'+stock+'" value="'+cantidad+'"> <input type="hidden" name="stock_antg[]" id="stock_antg[]" value="'+stock+'"></td>'+
          '<td><input type="number" name="precio_venta[]" id="precio_venta[]" value="'+precio_venta+'" onkeyup="modificarSubototales()" onchange="modificarSubototales()"></td>'+
          '<td><input type="number" name="descuento[]" value="'+descuento+'" onkeyup="modificarSubototales()" onchange="modificarSubototales()"></td>'+
          '<td class="text-right"><span class="text-right" name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
          '<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
          '</tr>';
          cont++;
          detalles=detalles+1;
          $('#detalles').append(fila);
          modificarSubototales();
          toastr.success('Planta: '+nombre+ ' agregada !!')
        }
      } else {
        toastr.error('El STOCK es 0 de la planta: '+nombre)
      }
    	
    } else {
    	// alert("Error al ingresar el detalle, revisar los datos del artículo");
		  toastr.error('Error al ingresar el detalle, revisar los datos de la planta.')
    }
}

function modificarSubototales() {
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_venta[]");
    var desc = document.getElementsByName("descuento[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	var inpD=desc[i];
    	var inpS=sub[i];

    	inpS.value=(inpC.value * inpP.value)-inpD.value;
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();
    toastr.success('Precio Actualizado !!!');

}
function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("S/. " + total);
    $("#total_venta").val(total);
    evaluar();
}

function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar_venta").show();
    }
    else
    {
      $("#btnGuardar_venta").hide(); 
      cont=0;
    }
}

function eliminarDetalle(indice){
  $("#fila" + indice).remove();
  calcularTotales();
  detalles=detalles-1;
  evaluar();
  toastr.warning('Planta removida.'); 
}

function buscar_sunat_reniec() {
	
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