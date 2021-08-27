function init() {
//toastr.warning("Hola");
//toastr.success("Holii");
//toastr.error("Hiiiii");
  // Conseguir elemento
  var idplanta_compra = localStorage.getItem("idplanta_compra");
  //console.log(idplanta_compra);
  ver_planta_compra(idplanta_compra);

  //Cargamos los items al select COLOR
  $.post("../../admin/ajax/vista_web.php?op=selectColor", { idplanta_compra: idplanta_compra }, function (r) {
    $("#idcolor").html(r);
     
    $("#idcolor").selectpicker("refresh");
    console.log('color listado');

    if ($("#sin_color").length) {
      $('.ocultar-select-color').hide();
      $('#cantidad').addClass('mb-4');
      console.log('color ocultdo');
    }else{
      $('.ocultar-select-color').show();
      $('#cantidad').removeClass('mb-4');
      console.log('color visto');
    }
  });
}

function ver_planta_compra(idplanta_compra) {
  //console.log(idplanta_compra);

  $.post("../../admin/ajax/vista_web.php?op=ver_planta_compra", { idplanta_compra: idplanta_compra }, function (data, status) {
    data = JSON.parse(data);
    /**
     *
     */
   // console.log('stock : '+data.stock);
    var especificaciones="";
    $("#nombre_v").html(data.nombre);
    $("#nombre").val(data.nombre);
    $("#stock").html(data.stock);
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + "</center>" + "";
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + "</center>" + "";
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + "</center>" + "";
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_1 + '" id="image1">' + '<img class="rounded-circle"  src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/' + data.img_2 + '" id="image1">' + '<img  class="rounded-circle" src="../../admin/files/articulos/' + data.img_3 + '" id="image1">' + "</center>" + "";
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
        '<img class="rounded-circle" src="../../admin/files/articulos/' +
        data.img_1 +
        '" id="image1">' +
        '<img class="rounded-circle" src="../../admin/files/articulos/' +
        data.img_2 +
        '" id="image1">' +
        '<img class="rounded-circle" src="../../admin/files/articulos/' +
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
      var secc_img_p = "" + "<center>" + '<img class="rounded-circle" src="../../admin/files/articulos/rosa_defecto_v.svg" id="image1">' + "</center>" + "";
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

function ocultar_color() {
  
}

ocultar_color();

