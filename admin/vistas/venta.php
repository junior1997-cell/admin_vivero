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
                          <h1 class="box-title">VENTAS <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Usuario</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Total Venta</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 100%;" id="formularioregistros">
                        <form name="formulario_venta" id="formulario_venta" method="POST" autocomplete="off">
                          <!-- CLIENTE -->
                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <label>Cliente(*):</label>
                            <input type="hidden" name="idventa" id="idventa">
                            <div class="row">
                              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                <select id="idcliente" name="idcliente" class="form-control selectpicker" data-live-search="true" required title="Seleccione cliente">                              
                                </select>
                              </div>
                              <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" data-toggle="tooltip" data-original-title="Agregar Usuario" >
                                <a data-toggle="modal" href="#agregar_cliente">           
                                  <button  type="button" class="btn btn-success btn-block" onclick="limpiar_cliente();">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                  </button>
                                </a>
                              </div>                              
                            </div>                            
                          </div>
                          <!-- FECHA -->
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Fecha(*):</label>
                            <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" required="">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Comprobante(*):</label>
                            <select name="tipo_comprobante" id="tipo_comprobante" class="form-control selectpicker" required="" data-live-search="true">
                               <option value="Boleta">Boleta</option>
                               <option value="Factura">Factura</option>
                               <option value="Ticket">Ticket</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Serie:</label>
                            <input type="text" class="form-control" name="serie_comprobante" autocomplete="off" id="serie_comprobante" maxlength="7" placeholder="Serie">
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Número:</label>
                            <input type="text" class="form-control" name="num_comprobante" autocomplete="off" id="num_comprobante" maxlength="10" placeholder="Número" >
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                            <label>Impuesto:</label>
                            <input type="text" class="form-control" name="impuesto" autocomplete="off" id="impuesto" >
                          </div>
                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a data-toggle="modal" href="#myModal">           
                              <button id="btnAgregarArt" type="button" class="btn btn-success"> <span class="fa fa-plus"></span> Agregar Planta</button>
                            </a>
                          </div>

                          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                              <thead style="background-color:#5cb88e87">
                                    <th>Opciones</th>
                                    <th>Planta</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                                    
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center"><h4>TOTAL</h4> </th>
                                    <th>
                                      <b>
                                        <h4 class="text-right" id="total" style="font-weight: bold;">S/. 0.00</h4>
                                        <input type="hidden" name="total_venta" id="total_venta">
                                      </b>
                                    </th> 
                                </tfoot>
                                <tbody>
                                  
                                </tbody>
                            </table>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-success" type="submit" id="btnGuardar_venta"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccionar Planta</h4>
        </div>
        <div class="modal-body table-responsive">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover" style="width: 100% !important;">
            <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio Venta</th>
            </thead>
            <tbody>
              
            </tbody>
             
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>        
      </div>
    </div>
  </div>  
  <!-- Fin modal -->

  <!-- agrgar cliente -->
  <div class="example-modal">
    <div class="modal fade " id="agregar_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="border-radius: 10px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar Cliente <i class="fa fa-user" aria-hidden="true"></i></h4>
          </div>
          <div class="modal-body">
            <form name="formulario_cliente" id="formulario_cliente" method="POST" autocomplete="off">
              <input type="hidden" name="idpersona" id="idpersona">
              <input type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente">
              <!-- TIPO DE DOCUMENTO -->
              <div class="form-group col-xs-12 col-sm-6 col-md-4 col-lg-4 cambiar">
                <label>Tipo Documento:</label>
                <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required title="Seleccione" onchange="ocultar_inputs();">
                  <option selected value="DNI">DNI</option>
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
                  <span class="input-group-addon" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-color: #0095519e; cursor: pointer;" onclick="buscar_sunat_reniec();" data-toggle="tooltip" data-original-title="Buscar SUNAT/RENIEC">
                    <i class="fa fa-search text-success" id="search"></i>
                    <i class="fa fa-spinner fa-pulse fa-fw fa-lg" id="charge" style="display: none;"></i>
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

              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <button class="btn btn-success" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-danger"  type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-circle-left" ></i> Cancelar</button>
              </div>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
  </div>
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/venta.js"></script>
<?php 
}
ob_end_flush();
?>


