<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../../admin/config/Conexion.php";

   	//imagenes escritorios
        //carousel 
        $sql = "SELECT * FROM planta as pl, plantaimg as plimg WHERE pl.idplanta=plimg.id_planta ORDER BY idplanta DESC";
        $carousel_f = ejecutarConsulta($sql);

?> 

  <!-- Start Footer  -->
  <div class="container">
      <div class="title-all text-center mt-5">
          <h1>COMENTARIOS</h1>
      </div>
             <p>
            <button class="btn btn-outline-success" type="button" style="margin-bottom: 10px;" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Registrar comentario
            </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <input type="text" class="form-control" placeholder="Nombre" id="nombre">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <select name="" id="" class="form-control">
                                            <option  disabled selected >Seleccionar sexo</option>
                                            <option value="">Varon</option>
                                            <option value="">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" id="espcf_cuidado" name="espcf_cuidado" rows="4" cols="50" > </textarea>
                            </div>

                        </div>
                        <div class="text-center">
                        <button type="submit"  class="btn btn-outline-success mb-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
            <table class="table caption-top">
                <caption>List of users</caption>
                <tbody>
                    <!--1-->
                    <tr>
                        <th scope="row" style="width: 20%;">
                            <div class="row">
                                <div class="col-lg-4" style="padding-right: 0px;">
                                    <img class="profile-user-img img-responsive img-circle" src="../images/avatar_mujer.jpg" style="width: 90%;" alt="user">
                                </div>
                                <div class="col-lg-8"  style="padding-right: 0px;">
                                    <span class="username"><p style="margin-bottom: 0px !important;">Hermelinda Guaman</p></span>
                                    <span class="description">27/07/21</span>
                                </div>
                            </div>
                        </th>
                        <td>
                            <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia non dolorem officiis rem ducimus, 
                            reiciendis maxime aliquam at dignissimos expedita natus consequuntur obcaecati repudiandae minus 
                            autem recusandae explicabo sunt saepe.
                            </p>
                        </td>
                    </tr>
                    <!--1-->
                    <tr>
                        <th scope="row">
                            <div class="row">
                                <div class="col-lg-4" style="padding-right: 0px;">
                                    <img class="profile-user-img img-responsive img-circle" src="../images/avatar_varon.png" style="width: 90%;" alt="user">
                                </div>
                                <div class="col-lg-8"  style="padding-right: 0px;">
                                    <span class="username"><p style="margin-bottom: 0px !important;">Junior Cercado</p></span>
                                    <span class="description">27/07/21</span>
                                </div>
                            </div>
                        </th>
                        <td>
                            <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia non dolorem officiis rem ducimus, 
                            reiciendis maxime aliquam at dignissimos expedita natus consequuntur obcaecati repudiandae minus 
                            autem recusandae explicabo sunt saepe.
                            </p>
                        </td>
                    </tr>
                    <!--1-->

                </tbody>
            </table>

                

            </div>

    </div>
    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                while ($row = $carousel_f->fetch_assoc()) { 
            ?>
                    <div class="item">
                        <div class="ins-inner-box">
                            <img src="../../admin/files/articulos/<?php echo $row['img']; ?>" alt="" />
                            <div class="hov-in">
                                <i class="fab fa-pagelines"></i>                         
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <footer>
        <div class="footer-main">
            <div class="container">
				<hr>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>ACERCA DE VIVERO UPeU</h4>
                            <p id="descripcion" style="text-align: justify;"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="footer-link-contact">
                                    <h4>CONTÁCTENOS</h4>
                                    <ul>
                                        <li>
                                            <p><i class="fas fa-location-arrow"></i>Dirección: <span id="direccion_f"></span></p>
                                        </li>
                                        <li>
                                            <p><i class="fas fa-phone-square"></i>Teléfono: <span id="telefono_f"></span> </p>
                                        </li>
                                        <li>
                                            <p><i class="fas fa-envelope"></i>Correo: <span id="correo_f"></span></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="footer-link-contact">
                                    <h4>INTRANET</h4>
                                    <ul class="list list-icons list-icons-lg text-left">
                                        <li>
                                            <p><i class="fas fa-user"></i><a href="../../admin/vistas/login.html" target="_blank">Web Master</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <img src="../images/logo-footer-UPeU.png">
        <p class="footer-company">Todos los derechos son reservados. &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.upeu.edu.pe/">Universidad Peruana Unión</a> 
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>
    <!-- ALL JS FILES -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    
    <script src="../js/jquery.superslides.min.js"></script>
    <script src="../js/inewsticker.js"></script>
    <script src="../js/bootsnav.js."></script>
    <script src="../js/images-loded.min.js"></script>
    <script src="../js/isotope.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/baguetteBox.min.js"></script>
    <script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/whatsappme.min.js"></script>

    <script src="scripts/pedido_planta.js"></script>

    
    <!-- select PICKER -->
    <script src="../js/bootstrap-select.js"></script>
    <!-- Toastr -->
    <!-- <script src="../../admin/public/toastr/toastr.min.js"></script> -->

    <script>
        /**Funciones para mostrar en la vista web */
        function mostrar_contact_v() {
        $.post("../../admin/ajax/vista_web.php?op=mostrar_contact_v", {
        }, function(data, status) {
            data = JSON.parse(data);
           // console.log(data);
            $("#direccion_f").html(data.direccion);
        // $("#telefono_f").val(data.coordenadas);
            $("#telefono_f").html(data.telefono);
            $("#correo_f").html(data.email);
        })
        }
        /**
         * contactanos
         */
        function mostrar_contactanos() {
        $.post("../../admin/ajax/vista_web.php?op=mostrar_contact_v", {
        }, function(data, status) {
            data = JSON.parse(data);
           // console.log(data);
            $("#direccion_contact").html(data.direccion);
        // $("#telefono_f").val(data.coordenadas);
            $("#telefono_contact").html(data.telefono);
            $("#correo_contact").html(data.email);
        })
        }
        /**
         * 
         */
        function telefonoheader() {
        $.post("../../admin/ajax/vista_web.php?op=mostrar_contact_v", {
        }, function(data, status) {
            data = JSON.parse(data);
            $("#telefono").html(data.telefono);
        })
        }
        /**################# */
        function mostrar_descrp_v() {
        $.post("../../admin/ajax/vista_web.php?op=mostrar_descrp_v", {
        }, function(data, status) {
            data = JSON.parse(data);
           // console.log(data);
            $("#descripcion").html("<br>" + (data.descripcion.substr(0,216)+" ...").replace(/\n/ig, '<br>') + "<br>");
        })
        }
        /**################ */
        function mostrar_descrp_v_index() {
        $.post("../../admin/ajax/vista_web.php?op=mostrar_descrp_v_index", {
        }, function(data, status) {
            data = JSON.parse(data);
            //console.log(data);
            $("#nombre_index").html(data.nombre);
            $("#descripcion_index").html("<br>" + (data.descripcion).replace(/\n/ig, '<br>') + "<br>");
        })
        }
        mostrar_descrp_v_index();
        telefonoheader();
        mostrar_contact_v();
        mostrar_contactanos();
        mostrar_descrp_v();
    </script>

</body>
</html>