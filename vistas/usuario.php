<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      // REQUIRED CSS
      require 'header.php';
    ?>
    
    <title>Vivero | Agregar Planta</title>
  </head>
  <body class="hold-transition  sidebar-mini layout-fixed  layout-navbar-fixed">
    <div class="wrapper">
      <!-- Precargado -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../freshshop/images/logo.png" alt="AdminLTELogo" height="120" width="260" />
      </div>
      <!-- Fin Precargado -->

      <?php
        // REQUIRED NAVBAR "ARRIBA"
        require 'navbar.php';
        // REQUIRED SIDEBAR "LATERAL IZQUIERDA"
        require 'sidebar.php';
      ?>   

      <!-- Contenido de la página -->
      <div class="content-wrapper">
        <!-- Contentenido Header -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Adminstrar los usuarios del sistema</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="usuario.php">Home</a></li>
                  <li class="breadcrumb-item active">Usuario</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- Fin-header -->

        <!-- Contenido Boby -->
        <section class="content">
          <div class="container-fluid">
             
            <!-- Main row -->
            <div class="row">
              <section class="col-lg-12 ">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <button class="btn btn-success" id="btnagregar" onclick=""data-toggle="modal" data-target="#modal-agregar-usuario">
                      <i class="fa fa-plus-circle"></i> Agregar
                    </button>
                  </div>
                  <div class="card-body">
                    <table id="tbllistado" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Direccion</th>
                          <th>Celular</th>
                          <th>Usuario</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Nombres</th>
                          <th>Direccion</th>
                          <th>Celular</th>
                          <th>Usuario</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </section>               
            </div>
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->

          <div class="modal fade" id="modal-agregar-usuario">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Agregar Usuario</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger" >&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formulario_usuario">
                    <div class="row">
                      <input type ="number" class="form-control" placeholder="DNI" name="dni" id="dni" min="8">
                      <!-- =================== DNI ==================== -->
                      <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="dni" class="control-label">DNI</label>
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="number" class="form-control" placeholder="DNI" name="dni" id="dni" min="8">
                            </div>
                        </div>
                        <!-- =================== NOMBRE ==================== -->
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Nombre</label>
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                            </div>
                        </div>
                        <!-- ================== APELLIDO ===================== -->
                        <div class="col-md-12" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Apellidos</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input  type="text" class="form-control" placeholder="Apellido" minlength="4" name="apellido" id="apellido" />
                            </div>
                        </div>
                        <!-- ================== USUARIO ===================== -->
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Usuario</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Usuario" minlength="4" name="usuario" id="usuario" />
                            </div>
                        </div>
                        <!-- ================== CONTRASEÑA ===================== -->
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Contraseña</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="password" class="form-control" placeholder="Contraseña" minlength="4" name="password" id="password" />
                            </div>
                        </div>
                        <!-- ====================DIRECCION====================== -->
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Direccion</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Dirección"  name="direccion" id="direccion" />
                            </div>
                        </div>
                        <!-- ====================CELULAR============================ -->
                        <div class="col-md-6" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Celular</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                                <input type="text" class="form-control" placeholder="Celular" name="celular" id="celular" />
                            </div>
                        </div>
                        <!-- ====================EMAIL OPCIONAL============================ -->
                        <div class="col-md-12" style="padding-bottom: 10px;">
                            <label for="profesion" class="control-label">Correo (opcional)</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                                <input type="text" class="form-control" placeholder="Correo"  name="correo" id="correo" />
                            </div>
                        </div>
                    </div>                
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="guardar_registro" class="btn btn-success">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>            
          </div>

        </section>
        <!-- Fin-Body -->

      </div> 
      <!-- Fin contenido --> 

      <?php
        require 'footer.php';
      ?>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <?php
      require 'script.php';
    ?>
    <script src="scripts/usuario.js"></script>
    
  </body>
</html>
