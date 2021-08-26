function init_pedido(){
  plantascarrito();

  //Cargamos los items al select color
  $.post("../../admin/ajax/vista_web.php?op=selectWhatsapp", function (r) {
    $("#listawhatsapp").html(r);
    // console.log(r);
    $("#listawhatsapp").selectpicker("refresh");
  });

}


var articuloscarritos= [];
// recuperamos las antiguas plantas      
if (localStorage.getItem("arrayplantas")) {
  // limpiamos
  // localStorage.setItem("arrayplantas","");

  var existe_planta=JSON.parse(localStorage.getItem("arrayplantas"));
  existe_planta.forEach(planta_exis => {
    const arrayplantas ={
      id_planta:planta_exis.id_planta,
      nombre:planta_exis.nombre,
      color:planta_exis.color,
      cantidad:planta_exis.cantidad,
      imagen:planta_exis.imagen
    }
    articuloscarritos=[...articuloscarritos,arrayplantas];
    var arrayplantasconvert = JSON.stringify(articuloscarritos);
     
  });        
}

// valimos si existe el ID "agregar"
if ($("#agregar").length) {

  document.querySelector("#agregar").addEventListener("click", function () {

    if (document.querySelector("#nombre").value=="" || document.querySelector("#cantidad").value=="") {

      alert("Estoy vacio");
      console.log(document.querySelector("#cantidad").value);

    } else {
      let id_planta = Math.random();;
      let nombre = document.querySelector("#nombre").value;
      let cantidad = document.querySelector("#cantidad").value;
      let color = document.querySelector("#idcolor").value;
      let imagen= document.querySelector("#vidadigital").src;
      //console.log(imagen);
      
      const arrayplantas ={
        id_planta:id_planta,
        nombre:nombre,
        color:color,
        cantidad:cantidad,
        imagen:imagen
      }
      articuloscarritos=[...articuloscarritos,arrayplantas];
      var arrayplantasconvert = JSON.stringify(articuloscarritos);
      
      localStorage.setItem("arrayplantas", arrayplantasconvert);

      plantascarrito();   
      // actiivar modal
      $('#modal_seguir_comprando').addClass('show'); 
      document.getElementById("modal_seguir_comprando").style.display="block";
       
    } 

  });
}

function plantascarrito(){
  
  
  var codigo_html='';
  if (localStorage.getItem("arrayplantas")) {
    var listcarrito=JSON.parse(localStorage.getItem("arrayplantas"));
    console.log('lista: '); console.log(localStorage.getItem("arrayplantas"));

    if (listcarrito.length != 0 ) {
      listcarrito.forEach(planta => {
        var color = planta.color=="" ? "Sin color" : planta.color;
        codigo_html = codigo_html+
          '<li id="pedido_'+planta.id_planta+'">'+
          '<a href="#" class="photo"><img src="'+planta.imagen+'" class="cart-thumb" style="border-radius: 50%;"/></a>'+
          '<div class="row">'+
            '<div class="col-lg-10" style="padding-left: 0px;">'+
            '<input type="hidden" name="color_p[]" value="'+planta.color+'">'+
            '<input type="hidden" name="nombre_p[]" value="'+planta.nombre+'" >'+
              '<h6><a href="#">'+planta.nombre+'</a></h6>'+
                '<div class="row">'+
                  '<div class="col-lg-9" style="padding-right: 0px;">'+
                    '<span class="badge bg-secondary px-1 py-1" style="color: white;font-size: 14px;">'+color+'</span>'+
                  '</div>'+
                  '<div class="col-lg-3" style="padding-left: 6px;">'+
                    '<input type="number" value="'+planta.cantidad+'" name="cantidad_p[]" min="1" max="99" style="width: 40px;height: 30px;background: #00ff3726;padding: 0px 0px 0px 7px;border: 1px solid #28a745;">'+
                  '</div>'+
              '</div>'+
            '</div>'+
            '<div class="col-lg-2" >'+
            '<i class="fas fa-trash-alt bt_eliminar" data-toggle="tooltip" data-original-title="Eliminar" onclick="eliminar_pedido('+planta.id_planta+')"></i>'+
            '</div>'+
          '</div>'+
          '</li>';
      });
    }else{
      codigo_html= '<span class="badge rounded-pill bg-warning py-2" style="font-size: 17px; color: white; width: 100% !important;">Carrito vacio</span>';
    }
    
    $('#listahtml_c').html(codigo_html);
  }
  
}


function enviar_whatsapp() {
  var nombre_envio = "";
  var color_envio = "";
  var cantidad_envio = "";
  var cuerpo_envio ="";
  
  
  // limpiamos el HTML, localStorage y el array= articuloscarritos
  var nombre_p = document.getElementsByName('nombre_p[]');
  var color_p = document.getElementsByName('color_p[]');
  var cantidad_p = document.getElementsByName('cantidad_p[]');
  var num_whatsapp = document.querySelector("#listawhatsapp").value;

  if (num_whatsapp != "") {
    // optenemos el nombre
    for (var i = 0; i < nombre_p.length; i++) {
      var a = nombre_p[i];
      nombre_envio =  a.value;

      // optenemos el color
      for (var j = 0; j < color_p.length; j++) {
        var b = color_p[j];
        if (j == i) {
          color_envio =  b.value ;
        }              
      }

      // optenemos el cantidad
      for (var k = 0; k < cantidad_p.length; k++) {
        var c = cantidad_p[k];
        if (k == i) {
          cantidad_envio =  c.value; 
        }           
      }  

      cuerpo_envio = '%0A*Planta:* '+nombre_envio+'%0A*Color:* '+ color_envio + '%0A*Cantidad:* ' + cantidad_envio + '%0A_________________________________________%0A'+cuerpo_envio;     
    } 
    console.log('cuerpo: ' + cuerpo_envio); 
    let url =
      "https://api.whatsapp.com/send?phone=+51"+
      num_whatsapp+
      "&text=*__Universidad Peruana Unión__*%0A*Vivero UPeU*%0A%0A*¿Nombre de la planta?*%0A_________________________________________"+
      cuerpo_envio+
      "%0A%0A*¡Gracias por su preferencia!*%0A%0A*¡EN SEGUIDA CONFIRMAMOS SU PEDIDO!*%0A";
    // saltamos a otra pagina
    window.open(url);

    $('#listahtml_c').html('<span class="badge rounded-pill bg-warning py-2" style="font-size: 17px; color: white; width: 100% !important;">Carrito vacio</span>');
    localStorage.removeItem("arrayplantas");
    articuloscarritos= [];
  }else{
    alert("Selecione un contacto");
  }
  
}


function cerrar_modal() {
  $('#modal_seguir_comprando').removeClass('show'); 
  document.getElementById("modal_seguir_comprando").style.display="none";
}

function ir_carrito() {
  $('.side').addClass('on');
  $('#modal_seguir_comprando').removeClass('show'); 
  document.getElementById("modal_seguir_comprando").style.display="none";
}

function eliminar_pedido(id) {

  // $("#pedido_" + id).remove();

  articuloscarritos=JSON.parse(localStorage.getItem("arrayplantas"));

  console.log(articuloscarritos);
  var id_delete = 0;
  articuloscarritos.forEach(function(elemento, indice, array) {
    
    if (elemento.id_planta == id) {
      console.log(elemento.id_planta, indice);
      id_delete = indice;
    }
  });

  var removed = articuloscarritos.splice(id_delete, 1);
  console.log(articuloscarritos);

  var removed_convert = JSON.stringify(articuloscarritos);      
  localStorage.setItem("arrayplantas", removed_convert);
  plantascarrito();
}
init_pedido();