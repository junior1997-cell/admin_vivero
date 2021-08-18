
<?php 
require'header.php';

//Incluímos inicialmente la conexión a la base de datos
    require "../../admin/config/Conexion.php";

    $sql = "SELECT `descripcion`, `mision`, `vision` FROM `nosotros`;";
    $nosotros = ejecutarConsultaSimpleFila($sql);
?>

    <!-- Site CSS -->
    <link rel="stylesheet" href="css/zoom.css">

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>NOSOTROS</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
                        <li class="breadcrumb-item active">NOSOTROS</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame ecfecto "> 
                        <img class="img-fluid " src="../images/nos.jpg" style="height: 100%; width: 100%; " alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">Nosotros<span> somos</span></h2>
                    <p style="text-align: justify;"><?php echo $nosotros['descripcion'] ?> </p>
					<a class="btn hvr-hover" href="contact-us.php">Contáctanos</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-6">
                    <div class="service-block-inner">
                        <h3>VISIÓN</h3>
                        <p style="text-align: justify;"><?php echo $nosotros['vision'] ?> </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="service-block-inner">
                        <h3>MISIÓN</h3>
                        <p style="text-align: justify;"><?php echo $nosotros['mision'] ?> </p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <!-- End About Page -->
<?php
require'footer.php';
?>
