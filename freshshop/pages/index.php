<?php
require'header.php';
?>
<style>
.mi_iamgen:hover {filter: blur(5px);}

@media (min-width:350px) and (max-width: 567px) { 
    
    .nombreplntita{
        text-align: center;
        color: white;

        padding: 150px 0px 0px 0px;
        font-size: 23px;
    }
    .nombreplntita strong{
        border-bottom-color: #ffffff;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    }
       /**/
 }
 @media (min-width:567px) and (max-width: 767px) { 
    
    .nombreplntita{
        text-align: center;
        color: white;

        padding: 170px 0px 0px 0px;
        font-size: 28px;
    }
    .nombreplntita strong{
        border-bottom-color: #ffffff;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    }
       /**/
 }
 @media (min-width:768px) and (max-width: 992px) { 
    
    .nombreplntita{
        text-align: center;
        color: white;

        padding: 135px 0px 0px 0px;
        font-size: 28px;
    }
    .nombreplntita strong{
        border-bottom-color: #ffffff;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    }
       /**/
 }
 @media (min-width:992px) and (max-width: 2024px) { 
    
    .nombreplntita{
        text-align: center;
        color: white;

        padding: 100px 0px 0px 0px;
        font-size: 23px;
    }
    .nombreplntita strong{
        border-bottom-color: #ffffff;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    }
       /**/
 }
 /*.nombreplntita{
        text-align: center;
        color: white;

        padding: 100px 0px 0px 0px;
        font-size: 20px;
    }*/

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


   <!-- Videos carousel Pincipal-->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <div class="container">
                    <div class="head content">
                    <div class="head-video">   
                    <video loop="loop" src="../images/video5.mp4" autoplay playsinline muted>                                                                                      
                     </video>  
                     <div class="head-overlay"></div>        
                     </div> 
                <div class="row">       
                        <div class="col-md-12 banner-cell cssbanner">                   
                             <h1 class="m-b-20 title"><strong>BIENVENIDOS AL <br> VIVERO UPeU</strong></h1><br>
                             <h1 class="subtitle"><b>TENEMOS TODAS LAS VARIEDADES QUE BUSCAS</b></h1>
                             <h1 style = "font-family:Brush Script MT"> <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Ornamentales:Flores:Árboles" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1> <br>
                     </div>
                 </div>
                </div>
                 
                </div>
            </li>
            <li class="text-center">
                <div class="container">
                    <div class="head content">
                    <div class="head-video">   
                    <video loop="loop" src="../images/video1.mp4" autoplay playsinline muted>                                                                                              
                     </video>  
                     <div class="head-overlay"></div>        
                     </div> 
                <div class="row">       
                        <div class="col-md-12 banner-cell" style="margin-top: 120px;">                   
                        <h1 class="m-b-20"><strong>BIENVENIDOS AL <br> VIVERO UPeU</strong></h1><br>
                        <h1 style = "font-size:23px;"><b>TENEMOS TODAS LAS VARIEDADES QUE BUSCAS</b></h1>

                        <h1 style = "font-family:Brush Script MT"> <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Ornamentales:Flores:Arboles" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>    <br>                   
                     </div>
                 </div>
                </div>
                 
                </div>
            </li>
            <li class="text-center">
                <div class="container">
                    <div class="head content">
                    <div class="head-video">   
                    <video loop="loop" src="../images/video3.mp4" autoplay playsinline muted>                                                                                              
                     </video>  
                     <div class="head-overlay"></div>        
                     </div> 
                <div class="row">       
                        <div class="col-md-12 banner-cell" style="margin-top: 120px;">                   
                        <h1 class="m-b-20"><strong>BIENVENIDOS AL <br> VIVERO UPeU</strong></h1><br>
                        <h1 style = "font-size:23px;"><b>TENEMOS TODAS LAS VARIEDADES QUE BUSCAS</b></h1>

                        <h1 style = "font-family:Brush Script MT"> <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Ornamentales:Flores:Arboles" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>   <br>                   

                     </div>
                 </div>
                </div>
                 
                </div>
            </li>          
        </ul>
    </div>
        <!-- fin Videos carousel Pincipal-->
        <!--  Products  -->
        <div class="products-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>Variedades de Plantas</h1>
                            <p>Comercialización de plantas naturales y ornamentales al por mayor y menor</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="special-menu text-center">
                            <div class="button-group filter-button-group" id="planta_categorias">
                                <!--Se lista de las categorias-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="height: 100%!important" id="listar_plantas">
                    
                    <!--Se lista las plantas-->
                    
                </div>
            </div>
        </div>
        <!-- fin Products  -->
    
        <!-- Acerca De Nosotros  
        col-	.col-sm-	.col-md-	.col-lg-	.col-xl-	.col-xxl--->
        <section>
            <div class="col-col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="title-all text-center">
                    <h1>Acerca de Nosotros</h1>
                </div>

                <div class="row" style="background-color: aquamarine;">
                    <div class="col-col-12 col-lg-6" style="padding: 4px 10px 4px 10px;">
                        <img class="mi_iamgen" src="../images/03.png" style="float: right; height: 100%; width: 100%;" />
                    </div>
                    <div class="col-col-12 col-lg-6" style="padding: 4px 10px 4px 4px;">
                        <h2 class="m-b-20 text-white" style="margin-top: 10px; font-size: 50px; text-align: center;" id="nombre_index"></h2>
                        <p style="font-size: 20px; padding: 5px; text-align: justify;" id="descripcion_index"></p>
                    </div>
                </div>
            </div>
        </section>
       <!-- Fin Acerca De Nosotros  -->

<?php
require'footer.php';
?>
<script type="text/javascript" src="scripts/planta.js"></script>