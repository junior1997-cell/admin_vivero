<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['carrucel']==1)
{
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title">
              Color <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
            </h1>
            <div class="box-tools pull-right"></div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Estado</th>
              </thead>
              <tbody></tbody>
              <tfoot>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Estado</th>
              </tfoot>
            </table>
          </div>
          <div class="panel-body" style="height: 400px;" id="formularioregistros">
            <form name="formulario" id="formulario" method="POST">
              <div class="form-group col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <label>Nombre:</label>
                <input type="hidden" name="idcarrucel" id="idcarrucel" />
                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required />
              </div>

              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="img">Imagen principal</label><br />
                <div id="img_i">
                   <!-- aqui va la previsualización --> 
                   <img onerror="this.src='../public/img/default/logo-video-y-foto.png';" src="../public/img/default/logo-video-y-foto.png" class="img-thumbnail"  style="cursor: pointer; height: 230px;" />
                </div>                
                <input style="display: none;" type="file" name="img" id="img" accept="video/*, .webp" required />
                <input type="hidden" name="img_actual" id="img_actual" />
                <div class="text-center" id="foto1_nombre"><!-- aqui va el nombre de la FOTO --></div>
              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
              </div>
            </form>
          </div>
          <!--Fin centro -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/carrucel.js"></script>
<?php 
}
ob_end_flush();
?>
