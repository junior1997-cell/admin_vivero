<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
  } else {
    require 'header.php';
     
    if ($_SESSION['planta']==1){
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
                  PLANTA <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
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
                    <th>Categoría</th>
                    <th>Familia</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
              <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST" autocomplete="off">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nombre: <sub>*</sub> </label>
                    <input type="hidden" name="idplanta" id="idplanta" />
                    <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" autocomplete="off" placeholder="Nombre" required />
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Categoría: <sub>*</sub> </label>
                    <select id="idcategoria" name="idcategoria" class="form-control selectpicker" required data-live-search="true" title="Seleccione una categoria"></select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Color:</label><br />
                    <select id="idcolor" name="idcolor[]" class="form-control selectpicker" multiple data-live-search="true" title="Seleccione los colores" data-actions-box="true"></select>
                  </div>
                  <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-6">
                    <label>Stock: <sub>*</sub> </label>
                    <input type="number" class="form-control" name="stock" id="stock" required min="1" autocomplete="off" placeholder="Stock"/>
                  </div>
                  <div class="form-group col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                    <label>Precio Venta: <sub>*</sub> </label>
                    <input type="number" class="form-control" name="precio_venta" id="precio_venta" required  min="0.10" step="0.1" autocomplete="off" placeholder="Precio"/>
                  </div>

                  <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label>Nombre Cientifico:</label>
                    <input type="text" class="form-control" name="nombre_cientifico" id="nombre_cientifico" maxlength="50" autocomplete="off" placeholder="Descripción" />
                  </div>
                  <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label>Nombre común:</label>
                    <input type="text" class="form-control" name="apodo" id="apodo" maxlength="50" autocomplete="off" placeholder="Descripción" />
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Familia:</label>
                    <input type="text" class="form-control" name="familia" id="familia" maxlength="50" autocomplete="off" placeholder="Descripción" />
                  </div>                  

                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Descripción: <sub>*</sub> </label>
                    <!-- <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" autocomplete="off" placeholder="Descripción" required> -->
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required> </textarea>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Especificaciones y cuidado: <sub>*</sub> </label>
                    <!-- <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" autocomplete="off" placeholder="Descripción" required> -->
                    <textarea class="form-control" id="espcf_cuidado" name="espcf_cuidado" rows="4" cols="50" > </textarea>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- <label>Imagen:</label>
                                <input type="file" multiple="true" class="form-control" name="imagen" id="imagen" accept="image/x-png,image/gif,image/jpeg">
                                <input type="hidden" name="imagenactual" id="imagenactual">
                                <img src="" width="150px" height="120px" id="imagenmuestra"> -->
                    <!-- <input name="file" type="file" /> -->
                    <!-- <input type="file" id="files" name="files[]" multiple accept=".webp" /> -->
                    <!-- <output id="list"></output> -->
                    <div class="alert alert-info alert-dismissible mt-1">
                      <button type="button" class="close cerrar_alerta_celeste" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h3 class="align-self-start" style="margin-top: 0px !important;"><i class="fa fa-info-circle"></i> Alert!</h3>
                      <ol>
                        <li>Tiene que ser imagen .WEBP</li>
                        <li>La imagen tiene que ser cuadrada (400x400).</li>
                        <li>La imagen tine que tener 2 Mb como maximo.</li>
                      </ol>
                    </div>
                    <div class="col-md-4">
                      <label for="foto1">Imagen principal <sub>*</sub></label>
                      <img onerror="this.src='../public/img/default/img_defecto.png';" style="height: auto;" src="../public/img/default/img_defecto.png" class="img-thumbnail" id="foto1_i" style="cursor: pointer; height: 230px;" width="300px" />
                      <input style="display: none;" type="file" name="foto1" id="foto1" accept=".webp" />
                      <input type="hidden" name="foto1_actual" id="foto1_actual" />
                      <div class="text-center" id="foto1_nombre"><!-- aqui va el nombre de la FOTO --></div>
                    </div>
                    <div class="col-md-4">
                      <label for="foto2">Imagen Secundaria 1</label>
                      <img onerror="this.src='../public/img/default/img_defecto.png';" style="height: auto;" src="../public/img/default/img_defecto.png" class="img-thumbnail" id="foto2_i" style="cursor: pointer; height: 230px;" width="300px" />
                      <input style="display: none;" type="file" name="foto2" id="foto2" accept=".webp" />
                      <input type="hidden" name="foto2_actual" id="foto2_actual" />
                      <div class="text-center" id="foto2_nombre"><!-- aqui va el nombre de la FOTO --></div>
                    </div>
                    <div class="col-md-4">
                      <label for="foto3">Imagen Secundaria 2</label>
                      <img onerror="this.src='../public/img/default/img_defecto.png';" style="height: auto;" src="../public/img/default/img_defecto.png" class="img-thumbnail" id="foto3_i" style="cursor: pointer; height: 230px;" width="300px" />
                      <input style="display: none;" type="file" name="foto3" id="foto3" accept=".webp" />
                      <input type="hidden" name="foto3_actual" id="foto3_actual" />
                      <div class="text-center" id="foto3_nombre"><!-- aqui va el nombre de la FOTO --></div>
                    </div>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Código:</label>
                    <input type="text" class="form-control mb-2" name="codigo" id="codigo" autocomplete="off" placeholder="Código Barras" />
                    <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                    <button class="btn btn-info" type="button" onclick="imprimir()"><i class="fa fa-print" aria-hidden="true"></i></button>
                    <button class="btn btn-danger" type="button" onclick="eliminar_barcode()"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <div id="print">
                      <svg id="barcode"></svg>
                    </div>
                  </div>

                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-success" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

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
      
      <!-- Modal -->
      <div class="modal fade" id="modal_detalle_planta" tabindex="-1" aria-labelledby="modal_detalle_plantaLabel" aria-hidden="true">
        <div class="modal-dialog modal-grande-responsive">
          <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
              <h5 class="modal-title" id="modal_detalle_plantaLabel">Detalle Planta</h5>              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-6  col-lg-5 col-xl-5">
                  <div id="carousel-example-generic" class="carousel slide mb-5" data-ride="carousel" style="background: #003e199e">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner ">
                      <div class="item active  ">
                        <center>
                        <img src="../files/articulos/0162938615541.webp" id="d_img1" alt="First slide" class="imagen-carrucel" >
                        </center>
                        
                        <div class="carousel-caption nombre-carrucel" style="text-shadow: -6px 7px 2px rgb(0 0 0) !important;">
                          <i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 1.5em;"></i>
                        </div>
                      </div>
                      <div class="item">
                        <center>
                          <img src="../files/articulos/0162938615541.webp" id="d_img2" alt="Second slide" class="imagen-carrucel" >
                        </center>
                        <div class="carousel-caption nombre-carrucel" style="text-shadow: -6px 7px 2px rgb(0 0 0) !important;">
                          <i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 1.5em;"></i>
                        </div>
                      </div>
                      <div class="item">
                        <center>
                          <img src="../files/articulos/0162938615541.webp" id="d_img3" alt="Third slide" class="imagen-carrucel" >
                        </center>
                        <div class="carousel-caption nombre-carrucel" style="text-shadow: -6px 7px 2px rgb(0 0 0) !important;">
                          <i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 1.5em;"></i>
                        </div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-7 col-xl-7">
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Categoria: </b>  
                      <p id="d_categoria">Hola como estna</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Precio Venta:</b>
                      <p id="d_precio">Hola como estna</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Stock:</b>
                      <p id="d_stock">Hola como estna</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Apodo:</b>
                      <p id="d_apodo">Hola como estna</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <b>Color:</b>
                      <p id="d_color">Hola como estna</p>
                    </div>                                
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Nombre Cientifico:</b>
                      <p id="d_cientifico">Hola como estna</p>
                    </div>                
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                      <b>Familia:</b>
                      <p id="d_familia">Hola como estna</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <b>Descripción:</b>
                      <p id="d_descripcion">Hola como estna</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <b>Especificaciones y cuidado:</b>
                      <p id="d_cuidado">Hola como estna</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      

    </div>
    <!-- /.content-wrapper -->
    <!--Fin-Contenido-->

    <?php
    } else  {
      require 'noacceso.php';
    }
    require 'footer.php';
    ?>
      <script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
      <script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
      <script type="text/javascript" src="scripts/planta.js"></script>
      
      
    <?php 
  }
  ob_end_flush();
?>