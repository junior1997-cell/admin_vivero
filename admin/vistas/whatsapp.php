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

if ($_SESSION['whatsapp']==1)
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
                          <h1 class="box-title">WHATSAPP <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Número</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                    <form name="formulario" id="formulario" method="POST">
                      <div class="row">
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Nombre:</label>
                          <input type="hidden" name="idwhatsapp" id="idwhatsapp" />
                          <input type="text" class="form-control" name="nombre" id="nombre" maxlength="15" placeholder="Nombre" required />
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Numero:</label>
                          <div class="input-group">
                            <span class="input-group-addon">+51</span>
                            <input type="number" class="form-control" name="numero" id="numero"  max="999999999" placeholder="Numero" required />
                          </div>
                        </div>
                        <!-- Color Picker -->
                        <style>
                          .colorpicker-element .input-group-addon i {
                            width: 30px !important;
                            height: 26px !important;
                          }
                        </style>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                          <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
                      </div>
                    </form>

                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/whatsapp.js"></script>
<!-- bootstrap color picker -->
<script src="../public/colorpicker/bootstrap-colorpicker.min.js"></script>
<script >
  //Colorpicker
  $(".my-colorpicker1").colorpicker();
  //color picker with addon
  $(".my-colorpicker2").colorpicker();
</script>
<?php 
}
ob_end_flush();
?>


