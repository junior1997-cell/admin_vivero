function init() {
    listar_categorias();
    listar_categorias_galery()
    listar_plnts_prncpal(id_categoria);
    listar_plnts_galery(id_categoria);


};

function listar_categorias() {

    listar_plnts_prncpal('0');

    $('#planta_categorias').html('');

    $.post("../../admin/ajax/vista_web.php?op=listar_categorias", {}, function (data, status) {

        data = JSON.parse(data);
        var home = '';
        var estado_home = true;

        $.each(data, function (index, value) {

            if (estado_home == true) {
                home = '<button class="active" id="id_categoria_0" onclick="listar_plnts_prncpal(0)">Todo</button>'
                estado_home = false;
            } else {
                estado_home = false;
                home = '';
            }
            var categorias = `${home} <button id="id_categoria_${value.idcategoria}" onclick="listar_plnts_prncpal(${value.idcategoria})">${value.nombre}</button>`;

            $("#planta_categorias").append(categorias);
        });
    })


}

function listar_categorias_galery() {

    listar_plnts_galery('0');

    $('#planta_categ_galery').html('');

    $.post("../../admin/ajax/vista_web.php?op=listar_categorias", {}, function (data, status) {

        data = JSON.parse(data);
        var home = '';
        var estado_home = true;

        $.each(data, function (index, value) {

            if (estado_home == true) {
                home = '<button class="active" id="id_categoria_0" onclick="listar_plnts_galery(0)">Todo</button>'
                estado_home = false;
            } else {
                estado_home = false;
                home = '';
            }
            var categorias = `${home} <button id="id_categoria_${value.idcategoria}" onclick="listar_plnts_galery(${value.idcategoria})">${value.nombre}</button>`;

            $("#planta_categ_galery").append(categorias);
        });
    })


}

function listar_plnts_prncpal(id_categoria){
    $("#listar_plantas").html('');
    $.post("../../admin/ajax/vista_web.php?op=listar_planta", { id_categoria: id_categoria }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        
        var clasesbadge="";
        var imagen="";

        if (data.length) {

            $.each(data, function (index, value) {

                if (value.stock>=0 && value.stock<=3) {
                    clasesbadge= "danger";
                   // console.log(clasesbadge);
                    
                }else if (value.stock>=4 && value.stock<6) {
                    clasesbadge= "warning";
                   
                }else{
                    clasesbadge= "success";
                }

                if (value.img_1!="") {
                    imagen=value.img_1;
                    
                } else if (value.img_2!="") {
                    imagen=value.img_2;
                   // console.log('imagen3'+imagen);
                }else if (value.img_3!=""){
                    imagen=value.img_3;
                }else{
                    imagen='rosa_defecto_v.svg';
                }
                
                //var idpalntita =value.idplanta;
                //ver_detalle_plnts(idplanta);
                var plantas = '' +
                    '<div class="col-lg-3 col-md-6 special-grid top-featured">' +
                        '<div class="products-single fix">' +
                            '<div class="box-img-hover">' +
                                '<img src="../../admin/files/articulos/'+imagen+'" class="img-fluid" alt="Image" />' +
                                '<div class="mask-icon">' +
                                        '<div class="item-info">' +
                                            '<div class="headline nombreplntita">' +
                                                '<strong>'+value.nombre+'</strong>' +
                                            '</div>' +
                                        '</div>' +
                                    '<ul>' +
                                        '<li>' +
                                            '<a href="detalles_plantas.php" data-toggle="tooltip" data-placement="right" title="Ver detalle" onclick="ver_detalle_plnts('+value.idplanta+')"><i class="fas fa-eye" style="font-size: 27px;"></i></a>' +
                                        '</li>' +
                                    '</ul>' +
                                    '<a class="cart" href="c_plantita.php" onclick="id_planta_compra('+value.idplanta+')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>' +
                                '</div>' +
                            '</div>' +
                            '<div class="why-text">' +
                                '<h4>'+value.nombre+'</h4>' +
                                '<span class="badge rounded-pill bg-'+clasesbadge+'" style="font-size: 17px; color: white;">Stock '+ value.stock+'</span>'+
                            '</div>' +
                        '</div>' +
                    '</div>'+
                    '';
                $("#listar_plantas").append(plantas);
            });
        } else {
            $("#listar_plantas").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                '<strong>No hay registros!</strong> Puedes agregar uno desde tu administrador.' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>')
        }
    })
}

function listar_plnts_galery(id_categoria){
    console.log(id_categoria);

    $("#plants_galery").html('');
    $.post("../../admin/ajax/vista_web.php?op=listar_planta", { id_categoria: id_categoria }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        
        var clasesbadge="";
        var imagen="";
        var imagen_defecto="";

        if (data.length) {

            $.each(data, function (index, value) {

                if (value.stock!=0) {
                    clasesbadge= "success";
                   // console.log(clasesbadge);
                    
                }else{
                    clasesbadge= "danger";
                   
                }

                if (value.img_1!="") {
                    imagen=value.img_1;
                    
                } else if (value.img_2!="") {
                    imagen=value.img_2;
                   // console.log('imagen3'+imagen);
                }else if (value.img_3!=""){
                    imagen=value.img_3;
                }else{
                    imagen='rosa_defecto_v.svg';
                }

                var plantas = '' +
                    '<div class="col-lg-3 col-md-6 special-grid bulbs">' + 
                        '<div class="products-single fix">' +
                            '<div class="box-img-hover">' +
                                    '<img src="../../admin/files/articulos/'+imagen+'" class="img-fluid" alt="Image" />' +
                                '<div class="mask-icon">' +
                                    '<div class="item-info">' +
                                        '<div class="headline nombreplntita">' +
                                            '<div class="descrplntita">'+
                                                '<p><strong>'+value.nombre+'</strong></p>' +
                                                '<div class="line"></div>' +
                                                '<div class="dit-line">'+value.descripcion.substr(0,120)+'...</div>' +
                                            '</div>'+
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '';
                $("#plants_galery").append(plantas);
            });
        } else {
            $("#plants_galery").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                '<strong>No hay registros!</strong> Puedes agregar uno desde tu administrador.' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>')
        }
    })

}

function ver_detalle_plnts(idplanta){
    // Guardar
    localStorage.setItem("idplanta", idplanta);
}
function id_planta_compra(idplanta){
    // Guardar
    localStorage.setItem("idplanta_compra", idplanta);
}

init();

/**
 * 
 * 
    '<div class="shop-cat-box">' +
        '<div class="special-box">' +
            '<div id="owl-demo">' +
                '<div class="item item-type-zoom">' +
                    '<a href="#" class="item-hover">' +
                        '<div class="item-info">' +
                            '<div class="headline">' +
                                '<strong>'+value.nombre+'</strong>'+ 
                                '<div class="line"></div>' +
                                '<div class="dit-line">'+value.descripcion.substr(1,120)+'...</div>' +
                            '</div>' +
                        '</div>' +
                    '</a>' +
                    '<div class="box-img-hover">' + '<img src="../../admin/files/articulos/'+imagen+'" class="img-fluid" alt="Image" />' + '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>' +
 */

