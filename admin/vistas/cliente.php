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
if ($_SESSION['ventas']==1)
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
                          <h1 class="box-title">CLIENTES <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
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
                            <th>Tipo de Cliente</th>
                            <th>Nacimiento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%; display:none;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST" onsubmit="return validacion_form()">
                          <!-- Input ocultos -->
                          <input type="hidden" name="idpersona" id="idpersona">
                          <input type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente">
                          <!-- TIPO DE DOCUMENTO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 cambiar">
                            <label>Tipo Documento:</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required title="Seleccione" onchange="ocultar_inputs();">
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                              <option value="CEDULA">CEDULA</option>
                              <option value="OTRO">OTRO</option>
                            </select>
                          </div>
                          <!-- NUMERO DE DOCUMENTO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 cambiar">
                            <label>Número Documento:</label>
                            <div class="input-group">                              
                              <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento">
                              <span class="input-group-addon" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #0095519e; cursor: pointer;" onclick="buscar_sunat_reniec();">
                                <i class="fa fa-search text-success" id="search"></i>
                                <i class="fa fa-spinner fa-pulse fa-fw" id="charge" style="display: none;"></i>
                              </span>
                            </div>
                          </div>
                          <!-- TIPO DE CLIENTE -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 cambiar">
                            <label>Tipo de cliente:</label>
                            <select class="form-control select-picker" name="tipo_cliente" id="tipo_cliente" required title="Seleccione">
                              <option value="NATURAL">NATURAL</option>
                              <option value="JURÍDICO">JURÍDICO</option>
                            </select>
                          </div>
                          <!-- NOMBRE / RAZON SOCIAL -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6 validar_nombre" >
                            <label id="label_nombre">Nombres y Apellidos</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="250" placeholder="Nombres y Apellidos" required>
                          </div>
                          <!-- APELLIDOS NOMBRE COMERCIAL -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" id="ocultar_nombre_comercial">
                            <label>Nombre-Comercial:</label>
                            <input type="text" class="form-control" name="apellidos_nombre_comercial" id="apellidos_nombre_comercial" maxlength="250" placeholder="Nombre-Comercial del cliente">
                          </div>
                          <!-- DIRECCION -->
                          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="350" placeholder="Dirección">
                          </div>
                          <!-- NACIMIENTO -->
                          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label>Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="nacimiento" id="nacimiento"placeholder="Fecha de Nacimiento" onclick="edades();" onchange="edades();">                            
                          </div>
                          <!-- EDAD -->
                          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label>Edad:</label>
                            <p id="p_edad">0 años.</p>                            
                          </div>
                          
                          <!-- TELEFONO -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Teléfono">
                          </div>
                          <!-- EMAIL -->
                          <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">
                          </div>

                          <!-- GUADAR - CANCELAR -->
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-success" type="submit" id="btnGuardar"  ><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform();ocultar_inputs();" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
 
<script type="text/javascript" src="scripts/cliente.js"></script>
<?php 
}
ob_end_flush();
?>