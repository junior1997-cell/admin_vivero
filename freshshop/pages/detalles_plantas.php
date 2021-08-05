<?php 
require'header.php';
?>
<style>
    .stilo{
        border-radius: 15px;
    }
</style>
    
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
            <div class="row" >
                <div class="col-lg-12">
                    <h2 id="nombre_c"></h2>  
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel_images" class="single-product-slider carousel slide" data-ride="carousel">

                    </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-15"
                style="background-color: aliceblue;padding: 10px;border-radius: 25px;">
                    <div class="single-product-details">

                        <h2 style="text-align: center;" id="nombre"></h2>
                        <p><b style="color: #1f1f1f;">Nombre Ciéntifico:</b> <span id="nombre_cient"></span>  </p>
                        <p><b style="color: #1f1f1f;">Familia:</b> <span id="familia"></span>  </p>
                        <p><b style="color: #1f1f1f;">Támbien Conocida Como:</b> <span id="apodo"></span>  </p>
                         <h4>Descripción:</h4>
                        <p style="text-align: justify;" id="descripciones"></p>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php
require'footer.php';
?>
<script type="text/javascript" src="scripts/datelles_plantas.js"></script>
