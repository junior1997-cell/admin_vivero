<?php
require'header.php';
?>
<style>
    @media screen and (min-device-width: 360px) and (max-device-width: 720px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 280px;
        }
    }
    @media screen and (min-device-width: 720px) and (max-device-width: 992px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 360px;
        }
    }
    @media screen and (min-device-width: 992px) and (max-device-width: 1366px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 460px;
        }
        .centerdiv{
            padding: 100px 0px 0px 0px;
        }
    }
    @media screen and (min-device-width: 1366px) and (max-device-width: 1440px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 480px;
        }
        .centerdiv{
            padding: 100px 0px 0px 0px;
        }
    }
    @media screen and (min-device-width: 1440px) and (max-device-width: 1920px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 600px;
        }
        .centerdiv{
            padding: 100px 0px 0px 0px;
        }
    }
    @media screen and (min-device-width: 1920px) and (max-device-width: 2666px) {
        .localizacion {
            border: 0;
            width: 100%;
            height: 600px;
        }
    }
    .contactnos{
        font-size: 20px;font-weight: bold;

    }
    .contact-info-left ul li p i {
        position: absolute;
        left: 0;
        top: 5px;
        padding-right: 6px;
        color: #075a19;
    }
    .contact-info-left h2 {
        font-size: 25px;
        font-weight: 700;
        text-align: center;
        border-bottom-color: #063e16;
        border-bottom-style: dashed;
        border-bottom-width: 2px;
        border-top-color: #3b921c;
        border-top-style: solid;
        border-top-width: 1px;
    } 
    .inf-leftt {
    margin-bottom: 0px!important;
    border-width: 1px;
    border-style: solid;
    border-color: black;
    border-radius: 8px;
    }
    .descrip{
        font-size: 19px;text-align: justify;

    }
    .descrip:hover {
      color: #21633ed9;
      font-weight: 700;
      font-size:21px;
    }
</style>

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

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contactos</h2>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main" style="padding: 20px 0px!important; background-color: aliceblue;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
                <div class="contact-form-right">
                    <h2 style="text-align: center;background-color: #84ba3f;color: white;">Nuestra localización para que nos visites</h2>
                     <iframe
                    src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d7928.724102984434!2d-76.39413242763895!3d-6.475743320848087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x91ba0be1d1b624cd%3A0x330ef57aa98583aa!2sPlaza%20de%20Armas%20Morales%2C%20Tarapoto!3m2!1d-6.4787664!2d-76.3834224!4m5!1s0x91ba096491199175%3A0xad06a6682ec7f08c!2sUPEU%2C%20Tarapoto%2022201!3m2!1d-6.4723901!2d-76.3965549!5e0!3m2!1ses!2spe!4v1628860293016!5m2!1ses!2spe"
                    class="localizacion"
                    allowfullscreen=""
                    loading="lazy"
                ></iframe>
                </div>
            </div>
            <!--col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8--->
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 centerdiv" >
                <div class="contact-info-left inf-leftt">
                    <h2>Información de Contacto</h2>
                    <p class="descrip">
                    Estamos siempre pendientes de atenderte por ello no dudes en comunicarte a través de nuestros teléfonos o Visitanos en Nuestro Vivero
                    </p>
                    <ul>
                        <li>
                            <p style="font-size: 20px;font-weight: bold;"><i class="fas fa-location-arrow"></i>Dirección: <a href="#" style="font-weight: normal;" id="direccion_contact"></a></p>
                        </li>
                        <li>
                            <p style="font-size: 20px;font-weight: bold;"><i class="fas fa-phone-square"></i>Celular: <a href="#" style="font-weight: normal;" id="telefono_contact"></a></p>
                        </li>
                        <li>
                            <p style="font-size: 20px;font-weight: bold;" ><i class="fas fa-envelope"></i>Correo: <a href="#" style="font-weight: normal;" id="correo_contact"></a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

<?php
require'footer.php';
?>
