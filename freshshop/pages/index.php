<?php
require'header.php';

require "../../admin/config/Conexion.php";
   	//imagenes escritorios
        //carousel ornamentales
        $sql = "SELECT * FROM carrucel where estado=1";
        $g_Ornamentales = ejecutarConsulta($sql);
        $sql = "SELECT * FROM whatsapp ORDER BY idwhatsapp DESC LIMIT 1";
        $num_whatsap = ejecutarConsultaSimpleFila($sql);

?>

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search" />
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Videos carousel Pincipal-->
<div id="slides-shop" class="cover-slides" style="position: relative; overflow: hidden; width: 100%; height: 558.438px;">
    <ul class="slides-container">
    <?php
        while ($row = $g_Ornamentales->fetch_assoc()) { ?>
        <li class="text-center"  >
            <div class="container">
                <div class="head content">
                    <div class="head-video">
                        <video loop="loop" src="../../admin/files/carrucel/<?php echo $row['img']; ?>" autoplay playsinline muted></video>
                        <div class="head-overlay"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 banner-cell cssbanner">
                            <h1 class="m-b-20 title">
                                <strong>
                                    BIENVENIDOS AL <br />
                                    VIVERO UPeU
                                </strong>
                            </h1>
                            <br />
                            <h1 class="subtitle"><b>TENEMOS TODAS LAS VARIEDADES QUE BUSCAS</b></h1>
                            <h1 style="font-family: Brush Script MT;">
                                <span class="typer" id="some-id" data-delay="200" data-delim=":" data-words="Ornamentales:Flores:Árboles" data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span>
                            </h1>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <?php }?>
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

        <div class="row" style="height: 100% !important;" id="listar_plantas">
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
<!-- boton flotante de whatsap  -->
<div
        class="whatsappme whatsappme--right"
        data-settings='{"telephone":"51<?php echo $num_whatsap['numero'] ?>","mobile_only":false,"button_delay":1,"whatsapp_web":false,"message_text":"Hola!\nen que podemos ayudarte","message_delay":2,"message_badge":false,"message_send":""}'
    >
    <div class="whatsappme__button">
        <svg class="whatsappme__button__open" viewBox="0 0 24 24">
            <path
                fill="#fff"
                d="M3.516 3.516c4.686-4.686 12.284-4.686 16.97 0 4.686 4.686 4.686 12.283 0 16.97a12.004 12.004 0 01-13.754 2.299l-5.814.735a.392.392 0 01-.438-.44l.748-5.788A12.002 12.002 0 013.517 3.517zm3.61 17.043l.3.158a9.846 9.846 0 0011.534-1.758c3.843-3.843 3.843-10.074 0-13.918-3.843-3.843-10.075-3.843-13.918 0a9.846 9.846 0 00-1.747 11.554l.16.303-.51 3.942a.196.196 0 00.219.22l3.961-.501zm6.534-7.003l-.933 1.164a9.843 9.843 0 01-3.497-3.495l1.166-.933a.792.792 0 00.23-.94L9.561 6.96a.793.793 0 00-.924-.445 1291.6 1291.6 0 00-2.023.524.797.797 0 00-.588.88 11.754 11.754 0 0010.005 10.005.797.797 0 00.88-.587l.525-2.023a.793.793 0 00-.445-.923L14.6 13.327a.792.792 0 00-.94.23z"
            />
        </svg>
        <div class="whatsappme__button__sendtext">Abrir chat</div>
        <svg class="whatsappme__button__send" viewbox="0 0 400 400" fill="none" fill-rule="evenodd" stroke="#fff" stroke-linecap="round" stroke-width="33">
            <path
                class="wame_plain"
                stroke-dasharray="1096.67"
                stroke-dashoffset="1096.67"
                d="M168.83 200.504H79.218L33.04 44.284a1 1 0 0 1 1.386-1.188L365.083 199.04a1 1 0 0 1 .003 1.808L34.432 357.903a1 1 0 0 1-1.388-1.187l29.42-99.427"
            />
            <path
                class="wame_chat"
                stroke-dasharray="1019.22"
                stroke-dashoffset="1019.22"
                d="M318.087 318.087c-52.982 52.982-132.708 62.922-195.725 29.82l-80.449 10.18 10.358-80.112C18.956 214.905 28.836 134.99 81.913 81.913c65.218-65.217 170.956-65.217 236.174 0 42.661 42.661 57.416 102.661 44.265 157.316"
            />
        </svg>
    </div>
    <div class="whatsappme__box">
        <div class="whatsappme__header">
            <svg viewBox="0 0 120 28">
                <path
                    fill="#fff"
                    fill-rule="evenodd"
                    d="M117.2 17c0 .4-.2.7-.4 1-.1.3-.4.5-.7.7l-1 .2c-.5 0-.9 0-1.2-.2l-.7-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1l.7-.7a2 2 0 0 1 1.1-.3 2 2 0 0 1 1.8 1l.4 1a5.3 5.3 0 0 1 0 2.3zm2.5-3c-.1-.7-.4-1.3-.8-1.7a4 4 0 0 0-1.3-1.2c-.6-.3-1.3-.4-2-.4-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11H110v13h2.7v-4.5c.4.4.8.8 1.3 1 .5.3 1 .4 1.6.4a4 4 0 0 0 3.2-1.5c.4-.5.7-1 .8-1.6.2-.6.3-1.2.3-1.9s0-1.3-.3-2zm-13.1 3c0 .4-.2.7-.4 1l-.7.7-1.1.2c-.4 0-.8 0-1-.2-.4-.2-.6-.4-.8-.7a3 3 0 0 1-.4-1 5.4 5.4 0 0 1 0-2.3c0-.4.2-.7.4-1 .1-.3.4-.5.7-.7a2 2 0 0 1 1-.3 2 2 0 0 1 1.9 1l.4 1a5.4 5.4 0 0 1 0 2.3zm1.7-4.7a4 4 0 0 0-3.3-1.6c-.6 0-1.2.1-1.7.4a3 3 0 0 0-1.2 1.1V11h-2.6v13h2.7v-4.5c.3.4.7.8 1.2 1 .6.3 1.1.4 1.7.4a4 4 0 0 0 3.2-1.5c.4-.5.6-1 .8-1.6.2-.6.3-1.2.3-1.9s-.1-1.3-.3-2c-.2-.6-.4-1.2-.8-1.6zm-17.5 3.2l1.7-5 1.7 5h-3.4zm.2-8.2l-5 13.4h3l1-3h5l1 3h3L94 7.3h-3zm-5.3 9.1l-.6-.8-1-.5a11.6 11.6 0 0 0-2.3-.5l-1-.3a2 2 0 0 1-.6-.3.7.7 0 0 1-.3-.6c0-.2 0-.4.2-.5l.3-.3h.5l.5-.1c.5 0 .9 0 1.2.3.4.1.6.5.6 1h2.5c0-.6-.2-1.1-.4-1.5a3 3 0 0 0-1-1 4 4 0 0 0-1.3-.5 7.7 7.7 0 0 0-3 0c-.6.1-1 .3-1.4.5l-1 1a3 3 0 0 0-.4 1.5 2 2 0 0 0 1 1.8l1 .5 1.1.3 2.2.6c.6.2.8.5.8 1l-.1.5-.4.4a2 2 0 0 1-.6.2 2.8 2.8 0 0 1-1.4 0 2 2 0 0 1-.6-.3l-.5-.5-.2-.8H77c0 .7.2 1.2.5 1.6.2.5.6.8 1 1 .4.3.9.5 1.4.6a8 8 0 0 0 3.3 0c.5 0 1-.2 1.4-.5a3 3 0 0 0 1-1c.3-.5.4-1 .4-1.6 0-.5 0-.9-.3-1.2zM74.7 8h-2.6v3h-1.7v1.7h1.7v5.8c0 .5 0 .9.2 1.2l.7.7 1 .3a7.8 7.8 0 0 0 2 0h.7v-2.1a3.4 3.4 0 0 1-.8 0l-1-.1-.2-1v-4.8h2V11h-2V8zm-7.6 9v.5l-.3.8-.7.6c-.2.2-.7.2-1.2.2h-.6l-.5-.2a1 1 0 0 1-.4-.4l-.1-.6.1-.6.4-.4.5-.3a4.8 4.8 0 0 1 1.2-.2 8.3 8.3 0 0 0 1.2-.2l.4-.3v1zm2.6 1.5v-5c0-.6 0-1.1-.3-1.5l-1-.8-1.4-.4a10.9 10.9 0 0 0-3.1 0l-1.5.6c-.4.2-.7.6-1 1a3 3 0 0 0-.5 1.5h2.7c0-.5.2-.9.5-1a2 2 0 0 1 1.3-.4h.6l.6.2.3.4.2.7c0 .3 0 .5-.3.6-.1.2-.4.3-.7.4l-1 .1a21.9 21.9 0 0 0-2.4.4l-1 .5c-.3.2-.6.5-.8.9-.2.3-.3.8-.3 1.3s.1 1 .3 1.3c.1.4.4.7.7 1l1 .4c.4.2.9.2 1.3.2a6 6 0 0 0 1.8-.2c.6-.2 1-.5 1.5-1a4 4 0 0 0 .2 1H70l-.3-1v-1.2zm-11-6.7c-.2-.4-.6-.6-1-.8-.5-.2-1-.3-1.8-.3-.5 0-1 .1-1.5.4a3 3 0 0 0-1.3 1.2v-5h-2.7v13.4H53v-5.1c0-1 .2-1.7.5-2.2.3-.4.9-.6 1.6-.6.6 0 1 .2 1.3.6.3.4.4 1 .4 1.8v5.5h2.7v-6c0-.6 0-1.2-.2-1.6 0-.5-.3-1-.5-1.3zm-14 4.7l-2.3-9.2h-2.8l-2.3 9-2.2-9h-3l3.6 13.4h3l2.2-9.2 2.3 9.2h3l3.6-13.4h-3l-2.1 9.2zm-24.5.2L18 15.6c-.3-.1-.6-.2-.8.2A20 20 0 0 1 16 17c-.2.2-.4.3-.7.1-.4-.2-1.5-.5-2.8-1.7-1-1-1.7-2-2-2.4-.1-.4 0-.5.2-.7l.5-.6.4-.6v-.6L10.4 8c-.3-.6-.6-.5-.8-.6H9c-.2 0-.6.1-.9.5C7.8 8.2 7 9 7 10.7c0 1.7 1.3 3.4 1.4 3.6.2.3 2.5 3.7 6 5.2l1.9.8c.8.2 1.6.2 2.2.1.6-.1 2-.8 2.3-1.6.3-.9.3-1.5.2-1.7l-.7-.4zM14 25.3c-2 0-4-.5-5.8-1.6l-.4-.2-4.4 1.1 1.2-4.2-.3-.5A11.5 11.5 0 0 1 22.1 5.7 11.5 11.5 0 0 1 14 25.3zM14 0A13.8 13.8 0 0 0 2 20.7L0 28l7.3-2A13.8 13.8 0 1 0 14 0z"
                />
            </svg>
            <div class="whatsappme__close">
                <svg viewBox="0 0 24 24"><path fill="#fff" d="M24 2.4L21.6 0 12 9.6 2.4 0 0 2.4 9.6 12 0 21.6 2.4 24l9.6-9.6 9.6 9.6 2.4-2.4-9.6-9.6L24 2.4z" /></svg>
            </div>
        </div>
        <div class="whatsappme__message">
            <div class="whatsappme__message__wrap">
                <div class="whatsappme__message__content">
                    Hola!<br />
                    en que podemos ayudarte
                </div>
            </div>
        </div>
        <div class="whatsappme__copy">
            Vivero UpeU
        </div>
    </div>
</div>
<!--fin  boton flotante de whatsap  -->
<style>
    .mi_iamgen:hover {
        filter: blur(5px);
    }
    @media (min-width: 263px) and (max-width: 350px) {
        .nombreplntita {
            text-align: center;
            color: white;

            padding: 150px 0px 0px 0px;
            font-size: 23px;
        }
        .nombreplntita strong {
            border-bottom-color: #ffffff;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        /**/
}
    @media (min-width: 350px) and (max-width: 567px) {
        .nombreplntita {
            text-align: center;
            color: white;

            padding: 150px 0px 0px 0px;
            font-size: 23px;
        }
        .nombreplntita strong {
            border-bottom-color: #ffffff;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        /**/
    }
    @media (min-width: 567px) and (max-width: 767px) {
        .nombreplntita {
            text-align: center;
            color: white;

            padding: 170px 0px 0px 0px;
            font-size: 28px;
        }
        .nombreplntita strong {
            border-bottom-color: #ffffff;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        /**/
    }
    @media (min-width: 768px) and (max-width: 992px) {
        .nombreplntita {
            text-align: center;
            color: white;

            padding: 135px 0px 0px 0px;
            font-size: 28px;
        }
        .nombreplntita strong {
            border-bottom-color: #ffffff;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }
        /**/
    }
    @media (min-width: 992px) and (max-width: 2024px) {
        .nombreplntita {
            text-align: center;
            color: white;

            padding: 100px 0px 0px 0px;
            font-size: 23px;
        }
        .nombreplntita strong {
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
<?php
require'footer.php';
?>
<script type="text/javascript" src="scripts/planta.js"></script>
