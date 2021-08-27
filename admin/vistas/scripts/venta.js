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
	$("#btnGuardar").prop("disabled",true);
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
          $("#idcategoria").val('default').selectpicker("refresh");
        }else{
          toastr.error(datos)
        }
	    }

	});
	limpiar();
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

init();