function init() {
    listar_categorias();
    listar_plnts_prncpal(id_categoria);

};

function listar_categorias() {

    listar_plnts_prncpal('0');

    $('#planta_categorias').html('');

    $.post("../../admin/ajax/vista_web.php?op=listar_categorias", {}, function (data, status) {

        data = JSON.parse(data);

        var pintar = '';
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


function listar_plnts_prncpal(id_categoria){

    $.post("../../admin/ajax/vista_web.php?op=listar_planta", { id_categoria: id_categoria }, function (data, status) {
        data = JSON.parse(data);
        console.log(data);
        $("#listar_plantas").html('');

        if (data.length) {

            $.each(data, function (index, value) {

                var plantas = '' +
                    '<div class="col-lg-3 col-md-6 special-grid top-featured">' +
                        '<div class="products-single fix">' +
                            '<div class="box-img-hover">' +
                                '<div class="type-lb">' +
                                    '<p class="sale">Sale</p>' +
                                '</div>' +
                                '<img src="../../admin/files/articulos/'+value.img+'" class="img-fluid" alt="Image" />' +
                                '<div class="mask-icon">' +
                                    '<ul>' +
                                        '<li>' +
                                            '<a href="../views/begonia_arbol.php" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a>' +
                                        '</li>' +
                                        '<li>' +
                                            '<a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a>' +
                                        '</li>' +
                                        '<li>' +
                                            '<a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a>' +
                                        '</li>' +
                                    '</ul>' +
                                    '<a class="cart" href="c_begoña_arbol.php">Al Carrito</a>' +
                                '</div>' +
                            '</div>' +
                            '<div class="why-text">' +
                                '<h4>'+value.nombre+'</h4>' +
                                '<h5>Stock <span>'+value.stock+'<span></h5>'+
                            '</div>' +
                        '</div>' +
                    '</div>'+
                    '';
                $("#listar_plantas").append(plantas);
            });
        } else {
            $("#listar_plantas").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                '<strong>No hay registros!</strong> Puedes agregar productos desde tu administrador.' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>')
        }
    })

}

init();