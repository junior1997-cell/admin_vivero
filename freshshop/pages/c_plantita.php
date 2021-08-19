<?php
require'header.php';
?>

<link rel="stylesheet" href="../css/carrito.css" />
<div class="box-add">
  <div class="container">
    <div class="row classrow">
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
      <div class="col-lg-4 col-md-12 col-sm-12 rowww divhead" style="margin-bottom: 0px !important; border-width: 1px; border-style: solid; border-color: black; border-radius: 8px;">
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
              <select id="idcolor" name="idcolor[]" class="form-control selectpicker"  multiple data-live-search="true" title="Seleccione los colores" data-actions-box="true" required></select>
            </div>

            <label for="whatsapp" class="formulario__label" style="font-size: 18px;font-weight: 900;">¿Con quien desea contactarse?</label>
            <select id="listawhatsapp" name="listawhatsapp" class="form-control selectpicker"  title="Selec. un contacto" data-live-search="true" required> </select>
            <br> <br>
            <button id="submit" type="button" class="form-control btn btn-outline-success" style="margin-bottom: 10px;">Contactar</button>
            <!-- https://api.whatsapp.com/send?phone=573105010573&text=*_Barberia%20Lider_*%20%0AReservas%0A%0A*%C2%BFCual%20es%20tu%20nombre?*%0A"Nombres"%20%0A*Barbero%20de%20preferencia*%0A"Barbero"%20%0A -->
          </form>
        </center>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-sm-6 col-lg-6">
        <div class="service-block-inner">
          <h3><b>Detalle De La Planta</b></h3>
          <p>Desarrollar personas <b>integras</b>, con espíritu de servicio <b>misionero</b> e <b>innovadoras</b> a fin de restaurar la imagen de Dios en el ser humano</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-6">
        <div class="service-block-inner">
          <h3><b>Especificaciones y Cuidado</b></h3>
          <p>Ser referente por la excelencia en el servicio <b>misionero</b> y la <b>calidad</b> educativa e <b>innovadora</b> en la iglesia y la sociedad.”</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require'footer.php';
?>
<!--form.js
<script src=""></script>-->
<script type="text/javascript" src="scripts/compra_plantas.js"></script>
<!-- Toastr -->
<script src="../../admin/public/toastr/toastr.min.js"></script>

