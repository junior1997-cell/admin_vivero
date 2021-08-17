<?php
require'header.php';
?>

<link id="changeable-colors" rel="stylesheet" href="../css/colors/vivid-yellow.css" />

<style>
        .item-type-zoom .item-info .headline:hover {
        background-color: #4644408c;

    }
</style>

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
                    <h2>GALERÍA</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                        <li class="breadcrumb-item active">GALERÍA</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Nuestra Galería</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group" id="planta_categ_galery">
                                <!--Se lista de las categorias-->
                            </div>
                        </div>
                </div>
            </div>

            <div class="row"  style="height: 100%!important"  id="plants_galery">           
                <!--Lista de plantas Galerìa-->
            </div>
        </div>
    </div>
    <!-- End Gallery  -->

<?php
require'footer.php';
?>
<script type="text/javascript" src="scripts/planta.js"></script>