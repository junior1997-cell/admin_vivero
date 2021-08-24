function init_pedido(){
  plantascarrito();

  //Cargamos los items al select CONTACTO
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
      nombre:planta_exis.nombre,
      color:planta_exis.color,
      cantidad:planta_exis.cantidad
    }
    articuloscarritos=[...articuloscarritos,arrayplantas];
    var arrayplantasconvert = JSON.stringify(articuloscarritos);
     
  });        
}

// valimos si existe el ID "agregar"
if ($("#agregar").length) {

  document.querySelector("#agregar").addEventListener("click", function () {

    if (document.querySelector("#nombre").value=="" || document.querySelector("#cantidad").value=="" ||document.querySelector("#idcolor").value=="" ) {

      alert("Estoy vacio");
      console.log(document.querySelector("#cantidad").value);

    } else {

      let nombre = document.querySelector("#nombre").value;
      let cantidad = document.querySelector("#cantidad").value;
      let color = document.querySelector("#idcolor").value;

      
      const arrayplantas ={
        nombre:nombre,
        color:color,
        cantidad:cantidad
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

    listcarrito.forEach(planta => {
      codigo_html = codigo_html+
        '<li>'+
          '<a href="#" class="photo"><img src="../../admin/files/articulos/0162938615541.webp" class="cart-thumb" style="border-radius: 50%;"/></a>'+
          '<h6><a href="#">'+planta.nombre+'</a></h6>'+
          '<div class="row">'+
              '<div class="col-lg-6">'+
                '<select name="" id="" style="width: 60px; height: 30px; border: #f0ad4e; background: #00ff3726;">'+
                    '<option value="">Select..</option>'+
                    '<option value="">Amarillo</option>'+
                    '<option value="">Anaranjadoooooo</option>'+
                    '<option value="">Rojo</option>'+
                '</select>'+
              '</div>'+
              '<div class="col-lg-6">'+
                '<input type="number" value="'+planta.cantidad+'" min="1" max="99" style="width: 40px; height: 30px; border: #f0ad4e; background: #00ff3726;">'+
              '</div>'+
          '</div>'+
        '</li>';
      });
    $('#listahtml_c').html(codigo_html);
  }
  
}


function enviar_whatsapp() {
  
  /*let url =
        "https://api.whatsapp.com/send?phone=+51"+
        listawhatsapp+
        "&text=*__Universidad Peruana Unión__*%0A*Vivero UPeU*%0A%0A*¿Nombre de la planta?*%0A"+
        nombre+
        "%0A*Cantidad*%0A"+
        cantidad+
        "%0A*Color de preferencia*%0A"+
        values+
        "%0A%0A*¡Gracias por su preferencia!*%0A%0A*¡EN SEGUIDA CONFIRMAMOS SU PEDIDO!*%0A";
    window.open(url);*/
  
  // limpiamos el HTML, localStorage y el array= articuloscarritos
  $('#listahtml_c').html('<span class="badge rounded-pill bg-warning py-2" style="font-size: 17px; color: white; width: 100% !important;">Carrito vacio</span>');
  localStorage.removeItem("arrayplantas");
  articuloscarritos= [];
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
init_pedido();