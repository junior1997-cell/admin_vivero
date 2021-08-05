var tabla;
function innit() {
  mostrarform(false);

  $("#btn_add_carrucel").click(function () {
    $("#add_carrucel").modal("show");
  });

  $("#btn_close_carrucel").click(function () {
    $("#add_carrucel").modal("hide");
    limpiar();
  });

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  $("#img_i").click(function () {
    $("#img").trigger("click");
  });

  $("#img").change(function (e) {
    addImage(e, $("#img").attr("id"));
  });

  listar();
}

//Función cancelarform
function cancelarform() {
  limpiar();
  mostrarform(false);
}

function limpiar() {
  $("#idcarrucel").val("");
  $("#nombre").val("");

  $("#img_i").html('<img src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
  $("#img").val("");
  $("#img_actual").val("");
}
//Función mostrar formulario
function mostrarform(flag) {
  limpiar();
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

function guardaryeditar(e) {
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/carrucel.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      if (datos == "ok") {
        toastr.success("imagen registrada");
        // bootbox.alert(datos);
        mostrarform(false);
        tabla.ajax.reload();
      } else {
        toastr.error(datos);
      }
    },
  });
  limpiar();
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
			if (sizekiloBytes <= 20480) {
				var reader = new FileReader();
				reader.onload = fileOnload;
				function fileOnload(e) {
					var result = e.target.result;
					$("#"+id+"_i").html('<video src="'+result+'" class="img-thumbnail" autoplay muted loop height="100%" ></video>');
					$("#"+id+"_nombre").html(''+
						'<div class="row">'+
              '<div class="col-md-12">'+  file.name +  '</div>'+
              '<div class="col-md-12">'+
                '<button  class="btn btn-danger  btn-block" onclick="'+id+'_b();" style="padding:0px 12px 0px 12px !important;" type="button" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>'+
              '</div>'+
            '</div>'+
					'');
					toastr.success('Video aceptado.')
				}
				reader.readAsDataURL(file);
			} else {
				toastr.warning('La imagen: '+file.name.toUpperCase()+' es muy pesada')
				$("#"+id+"_i").html('<img src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
				$("#"+id).val("");
				console.log(id);
			}
		}else{
			if (sizekiloBytes <= 20480) {
				var reader = new FileReader();
				reader.onload = fileOnload;
				function fileOnload(e) {
					var result = e.target.result; 
					$("#"+id+"_i").html('<img onerror="this.src='+'../public/img/default/logo-video-y-foto.png'+'" src="'+result+'" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
					$("#"+id+"_nombre").html(''+
						'<div class="row">'+
              '<div class="col-md-12">'+  file.name +  '</div>'+
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
				$("#"+id+"_i").html('<img src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
				$("#"+id).val("");
				console.log(id);
			}
		}
	}else{
		toastr.error('Seleccione una Imagen');
    $("#"+id+"_i").html('<img src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
		$("#"+id+"_nombre").html("");
	}	
	
}

//Función Listar
function listar() {
  tabla = $("#tbllistado")
    .dataTable({
      lengthMenu: [5, 10, 25, 75, 100], //mostramos el menú de registros a revisar
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "<Bl<f>rtip>", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../ajax/carrucel.php?op=listar",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      language: {
        lengthMenu: "Mostrar : MENU registros",
        buttons: {
          copyTitle: "Tabla Copiada",
          copySuccess: {
            _: "%d líneas copiadas",
            1: "1 línea copiada",
          },
        },
      },
      bDestroy: true,
      iDisplayLength: 5, //Paginación
      order: [[0, "desc"]], //Ordenar (columna,orden)
    })
    .DataTable();
}

/*MOSTAR UNA NOTICIA/COMENTARIO*/
function mostrar(idcarrucel) {
  $.post("../ajax/carrucel.php?op=mostrar", { idcarrucel: idcarrucel }, function (data, status) {
    data = JSON.parse(data);
    mostrarform(true);

    $("#nombre").val(data.nombre);
    $("#idcarrucel").val(data.idcarrucel);
    $("#img_actual").val(data.img);

    if (data.img == "") {
      $("#img_i").html('<img src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
    } else {
      if (data.img.split('.').pop() == "webp" || data.img.split('.').pop() == "WEBP") {
        $("#img_i").html('<img src="../files/carrucel/'+data.img+'" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />');
      } else {
        $("#img_i").html('<video src="../files/carrucel/'+data.img+'" class="img-thumbnail" autoplay muted loop height="100%" ></video>');
      }
      
        
    }
  });
}

//Función para activar registros
function activar(idcarrucel) {
  bootbox.confirm("¿Está Seguro de activar el Artículo?", function (result) {
    if (result) {
      $.post("../ajax/carrucel.php?op=activar", { idcarrucel: idcarrucel }, function (e) {
        if (e == "ok") {
          toastr.success("Imagen Activada correctamente");
          tabla.ajax.reload();
        } else {
          toastr.error(e);
        }
      });
    }
  });
}

//Función para desactivar registros
function desactivar(idcarrucel) {
  console.log(idcarrucel);
  bootbox.confirm("¿Está Seguro de desactivar el artículo?", function (result) {
    if (result) {
      $.post("../ajax/carrucel.php?op=desactivar", { idcarrucel: idcarrucel }, function (e) {
        if (e == "ok") {
          toastr.success("Imagen Desactivada correctamente");
          tabla.ajax.reload();
        } else {
          toastr.error(e);
        }
      });
    }
  });
}

innit();
