<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/Conexion.php";

  if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
  } else {
    require 'header.php';

    if (true) {
   	//carousel ornamentales
        $sql = "SELECT * FROM planta as pl WHERE id_categoria=1 AND estado=1 ORDER BY idplanta DESC;";
        $g_Ornamentales = ejecutarConsulta($sql);
        //var_dump($galeria);die();
        //carousel arboles
        $sql = "SELECT * FROM planta as pl WHERE id_categoria=2 AND estado=1 ORDER BY idplanta DESC;";
        $g_arboles = ejecutarConsulta($sql);
        //carousel flores
        $sql = "SELECT * FROM planta as pl WHERE id_categoria=3 AND estado=1 ORDER BY idplanta DESC;";
        $g_flores = ejecutarConsulta($sql);

        require_once "../modelos/Consultas.php";
        $consulta = new Consultas();
        //Datos para mostrar el gráfico de barras de las ventas
        $ventas12 = $consulta->ventasultimos_12meses();
        $fechasv='';
        $totalesv='';
        while ($regfechav= $ventas12->fetch_object()) {
            $fechasv=$fechasv.'"'.$regfechav->fecha .'",';
            $totalesv=$totalesv.$regfechav->total .','; 
        }

        //Quitamos la última coma
        $fechasv=substr($fechasv, 0, -1);
        $totalesv=substr($totalesv, 0, -1);
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
                                        <strong id="totalornamnetal"></strong>
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
                            style="background: url(../public/img/arbol.png);background-size: 100% 100%;">
                                <div class="inner">
                                <h3 style="font-size: 32px;"><strong>
                                            Árboles
                                        </strong></h3>
                                    <h4 style="font-size: 50px;">
                                        <strong id="totalarboles"></strong>
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
                            style=" background: url(../public/img/flores.png); background-size: 100% 100%;">
                                <div class="inner">
                                  <h3 style="font-size: 32px;"><strong>
                                            Flores
                                        </strong></h3>
                                    <h4 style="font-size: 50px;">
                                        <strong id="totalflores"></strong>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="box box-primary" style="background: url(../public/images/fonde_report.mp4); background-size: 100% 100%; background-color: #cccccc;">
                              <div class="box-header with-border">
                                Ventas de los últimos 12 meses
                              </div>
                              <div class="box-body">
                                 <canvas id="ventas" width="400" max-height="300" ></canvas>
                              </div>
                          </div>
                        </div>
                    </div>
                    <!--Galería --> 
                    <div class="panel-body">
                        <div class="linea"></div>
                            <div class="row">
                                 <!-- 1 -->
                                <div class="col-md-4">
                                
                                    <div id="carousel-main " class="carousel slide" data-ride="carousel" data-interval="5000">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner enventosg">
                                            <?php
                                                    $active = "active";
                                                    $imagen = "";
                                                    while ($row = $g_Ornamentales->fetch_assoc()) { 
                                                        if ($row['img_1']!="") {
                                                            $imagen=$row['img_1'];
                                                            
                                                        } else if ($row['img_2']!="") {
                                                            $imagen=$row['img_2'];
                                                           // console.log('imagen3'+imagen);
                                                        }else if ($row['img_3']!=""){
                                                            $imagen=$row['img_3'];
                                                        }else{
                                                            $imagen="rosa_defecto_v.svg";
                                                        }
                                                        ?>
                                            <div class="item <?php echo $active; ?>">
                                                <img src="../files/articulos/<?php echo $imagen; ?>";  style="width: auto; height: auto; display: block; margin: auto; border-radius: 10px;" />
                                                <div>
                                                    <strong>Nombre:
                                                    <span><?php echo $row['nombre']; ?></span>
                                                    </strong>
                                                </div>  
                                                <div>
                                                    <strong>Nombre Científico:</strong>
                                                    <span><?php echo $row['nombre_cientifico']; ?></span>
                                                </div> 
                                            </div>
                                            <?php $active = "";}?>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                 <!-- 2-->
                                <div class="col-md-4">
                                
                                    <div id="carousel-main " class="carousel slide" data-ride="carousel" data-interval="5000">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner enventosg">
                                            <?php
                                                    $active = "active";
                                                    $imagen = "";
                                                    while ($row = $g_arboles->fetch_assoc()) { 
                                                        if ($row['img_1']!="") {
                                                            $imagen=$row['img_1'];
                                                            
                                                        } else if ($row['img_2']!="") {
                                                            $imagen=$row['img_2'];
                                                           // console.log('imagen3'+imagen);
                                                        }else if ($row['img_3']!=""){
                                                            $imagen=$row['img_3'];
                                                        }else{
                                                            $imagen="rosa_defecto_v.svg";
                                                        }
                                                        ?>
                                            <div class="item <?php echo $active; ?>">
                                                <img src="../files/articulos/<?php echo $imagen; ?>"  style="width: auto; height: auto; display: block; margin: auto; border-radius: 10px;" />
                                                <div>
                                                    <strong>Nombre:
                                                    <span><?php echo $row['nombre']; ?></span>
                                                    </strong>
                                                </div>  
                                                <div>
                                                    <strong>Nombre Científico:</strong>
                                                    <span><?php echo $row['nombre_cientifico']; ?></span>
                                                </div> 
                                            </div>

                                            <?php $active = "";}?>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- 3-->
                                <div class="col-md-4">
                                    
                                    <div id="carousel-main " class="carousel slide" data-ride="carousel" data-interval="5000">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner enventosg">
                                            <?php
                                                    $active = "active";
                                                    $imagen = "";
                                                    while ($row = $g_flores->fetch_assoc()) {
                                                        if ($row['img_1']!="") {
                                                            $imagen=$row['img_1'];
                                                            
                                                        } else if ($row['img_2']!="") {
                                                            $imagen=$row['img_2'];
                                                           // console.log('imagen3'+imagen);
                                                        }else if ($row['img_3']!=""){
                                                            $imagen=$row['img_3'];
                                                        }else{
                                                            $imagen="rosa_defecto_v.svg";
                                                        }
                                                        ?>
                                            <div class="item <?php echo $active; ?>">
                                                <img src="../files/articulos/<?php echo $imagen; ?>"  style="width: auto; height: auto; display: block; margin: auto; border-radius: 10px;" />
                                                <div>
                                                    <strong>Nombre:
                                                    <span><?php echo $row['nombre']; ?></span>
                                                    </strong>
                                                </div>  
                                                <div>
                                                    <strong>Nombre Científico:</strong>
                                                    <span><?php echo $row['nombre_cientifico']; ?></span>
                                                </div>
                                            </div>

                                            <?php $active = "";}?>
                                        </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                    </div>
                    <br>
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
<script type="text/javascript" src="scripts/consultas.js"></script>
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/amorcit.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>


<style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    .fondog{
        background-color: #08da8314;
    }
    .galeria{
        font-family: 'open sans';
    }

    .galeria h1{
        text-align: center;
        margin:20px 0 15px 0;
        font-weight: 300;
    }

    .linea{
        border-top: 5px solid #0077C0;
        margin-bottom: 40px;
    }

    .contenedor-imagenes{
        display:flex;
        width: 85%;
        margin: auto;
        justify-content: space-around;
        flex-wrap: wrap;
        border-radius:3px;
    }

    .contenedor-imagenes .imagen{
        width: 25%;
        position: relative;
        height:250px;
        margin-bottom:5px;
        box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, .75)
    }
    .imagen img{
        width: 100%;
        height:100%;
        object-fit: cover;
    }

    .overlay{
        position: absolute;
        bottom: 0;
        left: 0;
        background:rgba(0 118 192 / 23%)!important ;
        /*rgb(115 127 187 / 37%);*/
        width: 100%;
        height: 0;
        overflow: hidden;
        transition: .5s ease;
    }

    .overlay h2{
        color: #fff;
        font-weight: 300;
        font-size:30px;
        position: absolute;
        top: 50%;
        left:50%;
        text-align: center;
        transform: translate(-50%, -50%);
    }

    .imagen:hover .overlay{
        height:100%;
        cursor: pointer;
    }

    @media screen and (max-width:1000px){
        .contenedor-imagenes{
            width: 95%;
        }
    }

    @media screen and (max-width:700px){
        .contenedor-imagenes{
            width: 90%;
        }
        .contenedor-imagenes .imagen{
            width: 48%;
        }
    }

    @media screen and (max-width:450px){
        h1{
            font-size:22px;
        }
        .contenedor-imagenes{
            width: 98%;
        }
        .contenedor-imagenes .imagen{
            width: 80%;
        }
    }
</style>

<script type="text/javascript">

var ctx = document.getElementById("ventas").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasv; ?>],
        datasets: [{
            label: 'Ventas en S/ de los últimos 12 Meses',
            data: [<?php echo $totalesv; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(153, 102, 255, 0.4)',
                'rgba(255, 159, 64, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.4)',
                'rgba(75, 192, 192, 0.4)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
<?php 
  }
  ob_end_flush();
?>