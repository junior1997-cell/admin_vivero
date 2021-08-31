<?php
require'header.php';
?>

<link id="changeable-colors" rel="stylesheet" href="../css/colors/vivid-yellow.css" />

<style>
    .item-type-zoom .item-info .headline:hover {
        background-color: #4644408c;

    }
    .nombreplntita p{
        text-align: center;
        border-bottom-color: #2ead63;
        border-bottom-style: solid;
        border-bottom-width: 1px; 
    }
    @media (min-width:350px) and (max-width: 567px) { 
    
    .descrplntita{
        padding: 115px 15px 15px 15px;
        text-align: justify;
        color: white;
        font-size: 20px;
    }
       /**/
 }
 @media (min-width:567px) and (max-width: 767px) { 
    
    .descrplntita{
        padding: 115px 65px 35px 65px;
        text-align: justify;
        color: white;
        font-size: 20px;
    }
       /**/
 }
 @media (min-width:768px) and (max-width: 992px) { 
    
    .descrplntita{
        padding: 80px 15px 15px 15px;
        text-align: justify;
        color: white;
        font-size: 18px;
    }
       /**/
 }
 @media (min-width:992px) and (max-width: 2024px) { 
    
    .descrplntita{
        padding: 50px 15px 15px 15px;
        text-align: justify;
        color: white;
    }
       /**/
 }

    /***/
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
                        <p>Conoce algunas de nuestras plantas.</p>
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
<!--<script type="text/javascript" src="scripts/planta.js"></script>-->