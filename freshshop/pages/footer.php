<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../../admin/config/Conexion.php";
        //comentarios.
        $sql="SELECT * FROM comentarios  WHERE estado=1 ORDER BY id_comentario DESC";
        $comentarios = ejecutarConsulta($sql);

    	//imagenes escritorios
        //carousel 
        $sql = "SELECT * FROM planta  WHERE estado=1 ORDER BY idplanta DESC";
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
                    <form name="formulario_coment" id="formulario_coment" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" minlength="3" maxlength="50" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select name="sexo" id="sexo" class="form-control" required>
                                            <option  disabled selected >Seleccionar sexo</option>
                                            <option value="1">Varon</option>
                                            <option value="0">Mujer</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <select id="id_planta_coment" name="id_planta_coment" class="form-control selectpicker" data-live-search="true" title="Seleccione una plantita"></select>
                                    </div> -->
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" id="comentario" name="comentario" rows="4" cols="50" > </textarea>
                            </div>

                        </div>
                        <div class="text-center">
                        <button type="submit"  class="btn btn-outline-success mb-3" id="btnGuardar"  >Submit</button>
                        <button style="display: none !important;"  id="recargar" onclick="actualizarLaPagina()" >recargar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <ul id="myList">
                <?php
                        // echo "1";
                    $imagen ="";
                    while ($row = $comentarios->fetch_assoc()) { 
                        // echo json_encode($row);
                        if ($row['sexo']=='1') {
                            $imagen="avatar_varon.svg";
                        } else { 
                            $imagen="avatar_mujer.svg";
                        } 

                        echo '<li>
                                <div class="row">
                                    <div class="col-lg-1" style="padding-right: 0px;">
                                    <img class="profile-user-img img-responsive img-circle" src="../images/'.$imagen.'" style="width: 70px;" alt="user">
                                    </div>
                                    <div class="col-lg-2"  style="padding-right: 0px;">
                                        <span class="username"><p style="margin-bottom: 0px !important; font-weight: bold;">'.$row['nombre'].'</p></span>
                                        <span>'.substr($row['fecha'], 0, 10).'</span>
                                    </div>
                                    <div class="col-lg-9"  style="padding-right: 0px;">
                                        <p class="coment" >'.$row['comentario'].'</p>
                                    </div>
                                </div>
                            </li>';
                    }
                ?>
            </ul>

    </div>
    
    <div class="continaer">
        <div class="row" style="margin: 10px;">
            <div class="col-6">
                <div id="loadMore" style="text-align: end;">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        Mostrar más</button>
                </div>
            </div>
            <div class="col-6">

                <div id="showLess">
                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                        Mostrar menos</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $imagen_carrucel ="rosa_defecto.svg";
                while ($row = $carousel_f->fetch_assoc()) {
                 if ($row['img_1'] != "" || $row['img_1'] != null ) {
                    $imagen_carrucel = $row['img_1'];
                 } else {
                    if ($row['img_2'] != "" || $row['img_2'] != null) {
                        $imagen_carrucel = $row['img_2'];
                    } else {
                        if ($row['img_3'] != "" || $row['img_3'] != null) {
                            $imagen_carrucel = $row['img_2'];
                        } else {
                            $imagen_carrucel = "rosa_defecto.svg";
                        }
                        
                    }
                    
                 }
                 
            ?>
                    <div class="item">
                        <div class="ins-inner-box">
                            <img src="../../admin/files/articulos/<?php echo $imagen_carrucel; ?>" alt="" />
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
                            <h4>EQUIPO DE TRABAJO</h4>
                            <!-- <p id="descripcion" style="text-align: justify;"></p> -->
                            <div class="row text-center">
                                <div class="col-lg-12">
                                    <p class="pt-1 mb-3">
                                        Esta página fue desarrollada por los estudiantes de escuela profesional de ingeniería de sistemas. 
                                        Bajo la dirección del Ing. Balwin Huamán y el Mg. Dany Lévano.
                                    </p>
                                </div> 
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <img src="../../admin/files/desarolladores/mirella.jpeg" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Jefe de Proyecto</p>
                                    <p class="pb-1">Lisset Huamán</p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <img src="../../admin/files/desarolladores/jhon.jpeg" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Analista de Base de Datos</p>
                                    <p class="pb-1">Jhon Melendrez</p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <img src="../../admin/files/desarolladores/david.jpeg" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Programador Front End</p>
                                    <p class="pb-1">David Requejo</p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <img src="../../admin/files/desarolladores/junior.jpg" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Programador Back End</p>
                                    <p class="pb-1">Junior Cercado</p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <img src="../../admin/files/desarolladores/laban.jpg" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Manager Principal</p>
                                    <p class="pb-1">Ing. Balwin Huamán</p>
                                </div> 
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <img src="../../admin/files/desarolladores/dany.jfif" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Manager Secundario</p>
                                    <p class="pb-1">Mg. Dany Lévano</p>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <img src="../../admin/files/desarolladores/teresa.webp" class="profile-user-img">
                                    <p class="pb-1" style="font-size: 10px;">Partner</p>
                                    <p class="pb-1">Teresa Gallegos</p>
                                </div>
                                       
                            </div>                            
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
        <p class="footer-company">Todos los derechos son reservados. &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.upeu.edu.pe/">EP - Ingeniería de Sistemas FT</a> 
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

    <!-- DATATABLES -->
    <script src="../../admin/public/datatables/jquery.dataTables.min.js"></script>    
    <script src="../../admin/public/datatables/dataTables.buttons.min.js"></script>
    <script src="../../admin/public/datatables/buttons.html5.min.js"></script>
    <script src="../../admin/public/datatables/buttons.colVis.min.js"></script>
    <script src="../../admin/public/datatables/jszip.min.js"></script>
    <script src="../../admin/public/datatables/pdfmake.min.js"></script>
    <script src="../../admin/public/datatables/vfs_fonts.js"></script>

    <!-- Responsive datatable -->
    <script src="../../admin/public/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../admin/public/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    
    <script src="scripts/pedido_planta.js"></script>
    <script src="scripts/planta.js"></script>

    <!-- select PICKER -->
    <script src="../js/bootstrap-select.js"></script>
    <!-- Toastr -->
    <!-- <script src="../../admin/public/toastr/toastr.min.js"></script> -->
    <style>
            #myList li {
                display: none;
                margin-bottom: 15px;
            }

            #loadMore {
                color: green;
                cursor: pointer;
            }

            #loadMore:hover {
                color: black;
            }

            #showLess {
                color: red;
                cursor: pointer;
            }

            #showLess:hover {
                color: black;
            }

            .imagen {
                width: 100%;
                height: 100%;
                padding: 10px;
                border-radius: 17px;

            }

            .conten {
                text-align: justify;
                color: #666;
                font-size: 17px;
            }
            li:hover{
                background-color: #9e9e9e54;
                border-radius: 8px;
            }
            .coment{
                margin: 0px;
                font-size: 17px;
            }
            .coment:hover{
                font-weight: bold;
            }

    </style>
    <script>
        $(document).ready(function() {
            size_li = $("#myList li").size();
            x = 5;
            $('#myList li:lt(' + x + ')').show();

            $('#loadMore').click(function() {
                x = (x + 3 <= size_li) ? x + 3 : size_li;
                $('#myList li:lt(' + x + ')').show();
            });

            $('#showLess').click(function() {
                x = (x - 3 < 1) ? 1 : x - 3;
                $('#myList li').not(':lt(' + x + ')').hide();
            });
        });
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