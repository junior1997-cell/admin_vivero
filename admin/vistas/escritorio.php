<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
  } else {
    require 'header.php';

    if ($_SESSION['escritorio']==1) {
      require_once "../modelos/Consultas.php";
      $consulta = new Consultas();
      //consulta total plantas arboles.
      $rsptac = $consulta->totalornamnetal();
      $regc=$rsptac->fetch_object();
      $totalornamnetal=$regc->totalornamnetal;
      //consulta total plantas arboles.
      $rsptac = $consulta->totalarboles();
      $regc=$rsptac->fetch_object();
      $totalarboles=$regc->totalarboles;
      //consulta total plantas arboles.
      $rsptac = $consulta->totalflores();
      $regc=$rsptac->fetch_object();
      $totalflores=$regc->totalflores;
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
                        <h1 class="box-title">Escritorio</h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                      <!--tototal ornamnetal-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="small-box bg-green"
                            style=" background: url(../public/img/ornamental.png); background-size: 100% 100%;">
                                <div class="inner">
                                <h3 style="font-size: 32px;">
                                        <strong>
                                            Ornamentales
                                        </strong>
                                    </h3>
                                    <h4 style="font-size: 50px;">
                                        <strong>
                                            <?php echo $totalornamnetal; ?>
                                        </strong>
                                    </h4>
                                    <p>Registradas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Fin tototal ornamnetal-->
                        <!--tototal arboles-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="small-box bg-green"
                            style="background: url(../public/img/ar.png);background-size: 100% 100%;">
                                <div class="inner">
                                <h3 style="font-size: 32px;"><strong>
                                            Árboles
                                        </strong></h3>
                                    <h4 style="font-size: 50px;">
                                        <strong>
                                            <?php echo $totalarboles; ?>
                                        </strong>
                                    </h4>
                                    <p>Registradas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- fintototal arboles-->
                        <!--tototal flores-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <div class="small-box bg-green"
                            style=" background: url(../public/img/flor.png); background-size: 100% 100%;">
                                <div class="inner">
                                  <h3 style="font-size: 32px;"><strong>
                                            Flores
                                        </strong></h3>
                                    <h4 style="font-size: 50px;">
                                        <strong>
                                            <?php echo $totalflores; ?>
                                        </strong>
                                    </h4>
                                    <p>Registradas</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- fin tototal flores-->
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    Compras de los últimos 10 días
                                </div>
                                <div class="box-body">
                                    <canvas id="compras" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    Ventas de los últimos 12 meses
                                </div>
                                <div class="box-body">
                                    <canvas id="ventas" width="400" height="300"></canvas>
                                </div>
                            </div>
                        </div>
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
    } else {
      require 'noacceso.php';
    }
    require 'footer.php';
?>

<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>

<?php 
  }
  ob_end_flush();
?>
