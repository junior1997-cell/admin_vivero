<?php
require'header.php';
?>

<link rel="stylesheet" href="../css/carrito.css" />
<div class="box-add">
  <div class="container pt-4">
    <div class="row classrow pt-3" style="padding-right: 15px; padding-left: 15px; -webkit-box-shadow: 1px 1px 1px 1px #008000;">
      <div class="col-lg-1 col-md-2 col-sm-12 entornodiv" style="padding: 0px;">
        <div class="imgpequeño ecfecto" id="img_peque">
          <!--Aqui va las imagenes ppequeñas-->
        </div>
      </div>
      <div class="col-lg-7 col-md-10 col-sm-12">
        <div class="imgestilo">
          <center>
            <figure>
              <img id="vidadigital" src="" title="Vida Verde" />
            </figure>
          </center>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 rowww divhead" style="margin-bottom: 15px !important; border-width: 1px; border-style: solid; border-color: black; border-radius: 8px;">
        <center>
          <form action="" class="formulario">
            <h1 class="formulario__titulo" id="nombre_v"></h1>
            <input id="nombre" type="hidden" class="formulario__input" required />

            <!--<label for="precio" class="formulario__label">Precio</label>
            <h4 class="h2" id="precio_v"><span>S/</span></h4>
            <input id="precio" type="hidden" class="formulario__input" required />-->

            <label for="cantidad" class="formulario__label" style="font-size: 18px;font-weight: 900;">Indica la cantidad</label>
            <input id="cantidad" type="number" class="form-control" style="border: 1px solid #28a745;" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />

            <div class="form-group">
              <label style="font-size: 18px;font-weight: 900;">Color:</label><br />
              <select id="idcolor" name="idcolor[]" class="form-control selectpicker" title="Seleccione los colores" data-actions-box="true" required></select>
            </div>

             
            <button id="agregar" type="button" class="form-control btn btn-outline-success" style="margin-bottom: 10px;">
              <i class="fa fa-shopping-cart pr-3" aria-hidden="true"></i>  Agregar al carrito  <i class="fa fa-shopping-cart pl-3" aria-hidden="true"></i>
            </button>
           <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>-->
             
            <!-- https://api.whatsapp.com/send?phone=573105010573&text=*_Barberia%20Lider_*%20%0AReservas%0A%0A*%C2%BFCual%20es%20tu%20nombre?*%0A"Nombres"%20%0A*Barbero%20de%20preferencia*%0A"Barbero"%20%0A -->
          </form>
        </center>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-sm-6 col-lg-6">
        <div class="service-block-inner">
          <h3><b>Detalle De La Planta</b></h3>
          <p id="detalle_pnta" style="text-align: justify;"></p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-6">
        <div class="service-block-inner">
          <h3><b>Especificaciones y Cuidado</b></h3>
          <p id="especif_cuidado" style="text-align: justify;"></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_seguir_comprando" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrar_modal()">
           Seguir Comprando
        </button>
        <button type="button" class="btn btn-success" onclick="ir_carrito()">
          <i class="fa fa-shopping-cart pr-3" aria-hidden="true"></i>
          Ir al carito
        </button>
      </div>
    </div>
  </div>
</div>
<!--toast
<div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
      <img src="..." class="rounded mr-2" alt="...">
      <strong class="mr-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>-->

<?php
require'footer.php';
?>
<!--form.js
<script src=""></script>-->
<script type="text/javascript" src="scripts/ver_plantas_carro.js"></script>
<!-- Toastr -->
<script src="../../admin/public/toastr/toastr.min.js"></script>

