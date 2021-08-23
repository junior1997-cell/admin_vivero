function init() {
//toastr.warning("Hola");
//toastr.success("Holii");
//toastr.error("Hiiiii");
  // Conseguir elemento
  var idplanta_compra = localStorage.getItem("idplanta_compra");
  //console.log(idplanta_compra);
  ver_planta_compra(idplanta_compra);

  //Cargamos los items al select COLOR
  $.post("../../admin/ajax/vista_web.php?op=selectColor", function (r) {
    $("#idcolor").html(r);
    console.log(r);
    $("#idcolor").selectpicker("refresh");
  });

  //Cargamos los items al select COLOR
  $.post("../../admin/ajax/vista_web.php?op=selectWhatsapp", function (r) {
    $("#listawhatsapp").html(r);
    // console.log(r);
    $("#listawhatsapp").selectpicker("refresh");
  });
}

function ver_planta_compra(idplanta_compra) {
  //console.log(idplanta_compra);

  $.post("../../admin/ajax/vista_web.php?op=ver_planta_compra", { idplanta_compra: idplanta_compra }, function (data, status) {
    data = JSON.parse(data);
    /**
     *
     */
    var especificaciones="";
    $("#nombre_v").html(data.nombre);
    $("#nombre").val(data.nombre);
    $("#detalle_pnta").html("<br>" + (data.descripcion).replace(/\n/ig, '<br>') + "<br>");
    if (data.espcf_cuidado!=null) {
      especificaciones=data.espcf_cuidado;
    }else{
      especificaciones='SIN ESPECIFICACIONES!!!';
    }
    $("#especif_cuidado").html("<br>" + (especificaciones).replace(/\n/ig, '<br>') + "<br>");

   /* $("#precio_v").html(data.precio_venta);
    $("#precio").val(data.precio_venta);*/
    /**1-2-3 */
    if (data.img_1 != "" && data.img_2 == "" && data.img_3 == "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_1 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
    } else if (data.img_1 == "" && data.img_2 != "" && data.img_3 == "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_2 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
    } else if (data.img_1 == "" && data.img_2 == "" && data.img_3 != "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_3 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }

      /**12--13 */
    } else if (data.img_1 != "" && data.img_2 != "" && data.img_3 == "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + '<img src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_1 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
    } else if (data.img_1 != "" && data.img_2 == "" && data.img_3 != "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + '<img src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_1 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
      /**21-23 */
    } else if (data.img_1 == "" && data.img_2 != "" && data.img_3 != "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + '<img src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_2 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
      /** */
    } else if (data.img_1 != "" && data.img_2 != "" && data.img_3 != "") {
      var secc_img_p =
        "" +
        "<center>" +
        '<img src="../../admin/files/articulos/' +
        data.img_1 +
        '" id="image1">' +
        '<img src="../../admin/files/articulos/' +
        data.img_2 +
        '" id="image1">' +
        '<img src="../../admin/files/articulos/' +
        data.img_3 +
        '" id="image1">' +
        "</center>" +
        "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/" + data.img_1 + "";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
    } else if (data.img_1 == "" && data.img_2 == "" && data.img_3 == "") {
      var secc_img_p = "" + "<center>" + '<img src="../../admin/files/articulos/rosa_defecto_v.svg" id="image1">' + "</center>" + "";
      $("#img_peque").append(secc_img_p);

      document.getElementById("vidadigital").src = "../../admin/files/articulos/rosa_defecto_v.svg";
      // El selector deseado
      var brandImg = document.querySelectorAll("#img_peque img");

      for (var i = 0; i < brandImg.length; i++) {
        var ckEdiloop = brandImg[i];
        ckEdiloop.addEventListener("click", function (el) {
          var thisSrc = this.src;
          var srcall = thisSrc.substring(0, 90);
          // alert(srcall);
          document.getElementById("vidadigital").src = srcall;
        });
      }
    } else {
      $("#img_peque").html(
        '<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
          "<strong>No hay registros!</strong> Puedes agregar uno desde tu administrador." +
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
          '<span aria-hidden="true">&times;</span>' +
          "</button>" +
          "</div>"
      );
    }
  });
}
let articuloscarritos= [];

document.querySelector("#submit").addEventListener("click", function () {
  //console.log("hola");
  /*const selected = document.querySelectorAll('#idcolor option:checked');
  const values = Array.from(selected).map(el => el.value);*/
  if (document.querySelector("#nombre").value=="" || document.querySelector("#listawhatsapp").value=="" ) {
        alert("Estoy vacio");
        console.log(document.querySelector("#cantidad").value);
  } else {
  let nombre = document.querySelector("#nombre").value;
 // let precio = document.querySelector("#precio").value;
  let cantidad = document.querySelector("#cantidad").value;
  //let color = document.querySelector("#idcolor").value;
  let color = document.querySelector("#idcolor").value;
  // Guardar
  //localStorage.setItem("nombre......", nombre);
  /**    "%0A*Precio por unidad*%0A"+
    precio+ */

  const arrayplantas ={
    nombre:nombre,
    color:color,
    cantidad:cantidad
  }
  articuloscarritos=[...articuloscarritos,arrayplantas];
  //console.log(articuloscarritos);
  var arrayplantasconvert = JSON.stringify(articuloscarritos);

    localStorage.setItem("arrayplantas", arrayplantasconvert);

  plantascarrito();
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
  }
});

function plantascarrito(){
  var listcarrito=localStorage.getItem("arrayplantas")

  listcarrito.forEach(planta => {
    $('#listahtml_c').html(
      '<li>'+
          '<a href="#" class="photo"><img src="../../admin/files/articulos/0162938615541.webp" class="cart-thumb" style="border-radius: 50%;"/></a>'+
          '<h6><a href="#">Delica omtantur 1</a></h6>'+
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
                  '<input type="number" min="1" max="99" style="width: 40px; height: 30px; border: #f0ad4e; background: #00ff3726;">'+
              '</div>'+
          '</div>'+
      '</li>');
    
  });
}

/*const carrito = document.querySelector('#carrito');
const contenedorcarrito = document.querySelector('#lista-carrito');
const vaciarbtncarrito = document.querySelector('#vaciarcarrito');
const listaplantas = document.querySelector('#listaplantas');

cargarEventListeners();
function cargarEventListeners(){
  cuando se agrega una planta  "Agregar al carrito"
  listaplantas.addEventListener('click', agregarplanta);
}*/

//funciones
 /*function agregarplanta(){
   console.log(e.target.classList);
 }*/

init();
