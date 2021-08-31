<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vivero UPeU - Campus Tarapoto</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../../freshshop/images/logo-ico.png">
    <link rel="shortcut icon" href="../../freshshop/images/logo-ico.png">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <!-- slect2 -->
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="../public/select2/css/select2.min.css">
    <link rel="stylesheet" href="../public/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->

    <!-- Toastr -->
    <link rel="stylesheet" href="../public/toastr/toastr.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../public/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- drop zone -->
    <link rel="stylesheet" href="../public/dropzone/dist/dropzone.css">
    <link rel="stylesheet" href="../public/dropzone/dist/min/dropzone.min.css">

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../public/colorpicker/bootstrap-colorpicker.min.css">

    <!-- stylo junoir -->
    <link rel="stylesheet" href="../public/css/style_junior.css">
    <style>
      .dropdown-menu {
        box-shadow: 0 0 40px #111;
      }
      sub {
        vertical-align: top;
        font-size: 1.2em;
        color: red;
      }      
    </style>
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UPEU</b>Vivero</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UPEUVivero</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu mt-2">
                   
                  <div class="box box-success">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" alt="User profile picture">
                      <h3 class="profile-username text-center"><?php echo $_SESSION['nombre']; ?></h3>
                      <p class="text-muted text-center"><?php echo $_SESSION['cargo']; ?></p>

                      <ul class="list-group list-group-unbordered">
                         
                        <li class="list-group-item">
                          <b>Telefono</b>
                          <p class="text-muted" style="margin-bottom:0px;">
                            <?php echo $_SESSION['telefono']; ?>
                          </p>  
                        </li>
                        <li class="list-group-item">
                          <b>E-mail</b>
                          <p class="text-muted" style="margin-bottom:0px;">
                            <?php echo $_SESSION['email']; ?>
                          </p>  
                        </li>
                      </ul>

                      <a href="../ajax/usuario.php?op=salir#" class="btn btn-danger btn-block"><b>SALIR</b></a>
                    </div><!-- /.box-body -->
                  </div>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php 
            if (true)
            {
              echo '<li id="lEscritorio">
              <a href="escritorio.php">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
            ?>

            <?php 
            if ($_SESSION['planta']==1)
            {
              echo '<li id="mAlmacen" class="treeview">
              <a href="#">
                <i class="fa fa-tree"></i>
                <span>Planta</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lPlanta"><a href="planta.php"><i class="fa fa-circle-o"></i> Planta</a></li>
                <li id="lCategorias"><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorías</a></li>
                <li id="lColor"><a href="color.php"><i class="fa fa-circle-o"></i>Color</a></li>
              </ul>
            </li>';
            }
            ?>

        <!-- nosotros -->

            <?php 
            if ($_SESSION['institucion']==1)
            {
              echo '<li id="mInstitucion" class="treeview">
              <a href="#">
                <i class="fa fa-university"></i>
                <span>Institución</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lNosotros"><a href="nosotros.php"><i class="fa fa-circle-o"></i> nosotros</a></li>                
              </ul>
            </li>';
            }
            ?>            

            <?php 
            if ($_SESSION['ventas']==1)
            {
              echo '<li id="mVentas" class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lVentas"><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li id="lClientes"><a href="cliente.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>';
            }
            ?>
                        
            <?php 
            if ($_SESSION['acceso']==1)
            {
              echo '<li id="mAcceso" class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lUsuarios"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li id="lPermisos"><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>';
            }
            ?>

            <?php 
            if ($_SESSION['carrucel']==1)
            {
              echo '<li id="lCarrucel">
                    <a href="carrucel.php">
                      <i class="fa fa-picture-o"></i> <span>Carrousel</span>
                    </a>
                  </li>';
            }
            ?>

            <?php 
            if ($_SESSION['whatsapp']==1)
            {
              echo '<li id="lWhatsapp">
                    <a href="whatsapp.php">
                      <i class="fa fa-whatsapp"></i> <span>Whatsapp</span>
                    </a>
                  </li>';
            }
            ?>           

             
            <!-- <li>
              <a href="carrucel.php">
                <i class="fa fa-plus-square"></i> <span>Carrousel</span>
              </a>
            </li> -->

            <!--<li>
              <a href="ayuda.php">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="acerca.php">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>-->
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
