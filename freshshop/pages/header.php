
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Vivero UPeU - Campus Tarapoto</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/simbolo.jpeg" type="image/x-icon">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap select -->
    <!--<link rel="stylesheet" href="../css/bootstrap.select.css">  -->
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!--bootsnav.css-->
    <link rel="stylesheet" href="../css/bootsnav.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <!--whasap.css-->
    <link rel="stylesheet" href="../css/whatsappme.min.css">

    <link id="changeable-colors" rel="stylesheet" href="../css/colors/orange.css" />
    <!-- Toastr -->
    <!-- <link rel="stylesheet" href="../../admin/public/toastr/toastr.min.css"> -->

</head>
<style>
    .bt_eliminar:hover{
        color: red;
        cursor: pointer;
    }
</style>

<body>
    <!-- Start Main Top -->
            <div class="main-top">
                <div class="container-fluid">
                    <div class="row" >
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                            <div class="right-phone-box">
                                <p>TELÉFONO <span id="telefono"></span></p>
                            </div>
                            <div class="our-link">
                                <ul>
                                    <li><a href="contact-us.php"><i class="fas fa-location-arrow"></i> Localización</a></li>
                                    <li><a href="contact-us.php"><i class="fas fa-headset"></i> CONTÁCTANOS</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav" style="    height: 70px !important;">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header" >
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand claselogo" href="index.php"><img src="../images/upeu/VIVERO_UPEU.png" width="350"  style="margin-left: -30%; margin-top: 3px" class="logo" alt=""></a>
                </div>

                <!-- End Header Navigation    style="margin-left: -20%; margin-top:-5px"-->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">INICIO</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">ACERCA DE NOSOTROS</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">GALERÍA</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">CONTÁCTANOS</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-cart"></i>
							<p>CARRITO</p>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <div>
                <a href="#" class="close-side bt_eliminar"><i class="fa fa-times-circle"></i></a>
                </div>

                <li class="cart-box " style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <ul class="cart-list"  id="listahtml_c" >
                        <span class="badge rounded-pill bg-warning py-2" style="font-size: 17px; color: white; width: 100% !important;">Carrito vacio</span>
                    </ul>

                    <li class="total px-3 py-3 bg-light" style="border-bottom-right-radius: 17px; border-bottom-left-radius: 17px;">
                        <label for="whatsapp" class="formulario__label" style="font-size: 13px;font-weight: 900;">¿Con quién desea contactarse?</label>
                        <select id="listawhatsapp" name="listawhatsapp" class="form-control selectpicker"  title="Selec. un contacto" data-live-search="true" required> </select>
                        <br> <br>
                        <button id="enviar_whatsapp" type="button" onclick="enviar_whatsapp()" class="form-control btn btn-success" style="margin-bottom: 10px; border: 2px solid #096424; border-bottom: solid 2px #096424 !important;">
                        <i class="fab fa-whatsapp pr-3" aria-hidden="true"></i>  Contactar  <i class="fab fa-whatsapp pl-3" aria-hidden="true"></i>
                        </button>
                    </li>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->