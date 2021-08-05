function init() {

    // Conseguir elemento
var idplanta=localStorage.getItem("idplanta");
    ver_detalle_plntss(idplanta);
};


function ver_detalle_plntss(idplanta){
    $.post("../../admin/ajax/vista_web.php?op=detalles_plantas", {idplanta : idplanta}, function (data, status) {

        data = JSON.parse(data);
        //alert(data);

		$("#nombre_c").html(data.nombre);
		$("#nombre").html(data.nombre);
		$("#nombre_cient").html(data.nombre_cientifico);
		$("#familia").html(data.familia);
		$("#apodo").html(data.apodo);
		$("#descripciones").html(data.descripcion);
            /**1-2-3 */
        if (data.img_1 !="" && data.img_2=="" && data.img_3=="") {
            var carousel = '' +
            '<div class="carousel-inner" role="listbox">'+
                 '<div class="carousel-item active "><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_1+'" alt="First slide"> </div>'+
            '</div>'+
            '';
            $("#carousel_images").append(carousel);
        } else if (data.img_1=="" && data.img_2!="" && data.img_3=="") {
            var carousel = '' +
                '<div class="carousel-inner" role="listbox">'+
                     '<div class="carousel-item active"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_2+'" alt="First slide"> </div>'+    
                '</div>'+
                '';
                $("#carousel_images").append(carousel);
            }else if (data.img_1=="" && data.img_2=="" && data.img_3!="") {
                var carousel = '' +
                '<div class="carousel-inner" role="listbox">'+
                     '<div class="carousel-item active"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_3+'" alt="First slide"> </div>'+    
                '</div>'+
                '';
                $("#carousel_images").append(carousel);
                /**12--13 */
            }else if (data.img_1!="" && data.img_2!="" && data.img_3=="") {
                var carousel = '' +
                    '<div class="carousel-inner" role="listbox">'+
                            '<div class="carousel-item active"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_1+'" alt="First slide"> </div>'+    
                            '<div class="carousel-item"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_2+'" alt="First slide"> </div>'+                      
                    '</div>'+
                    '';
                    $("#carousel_images").append(carousel);
                }else if (data.img_1!="" && data.img_2=="" && data.img_3!="") {
                    var carousel = '' +
                    '<div class="carousel-inner" role="listbox">'+
                             '<div class="carousel-item active"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_1+'" alt="First slide"> </div>'+    
                            '<div class="carousel-item"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_3+'" alt="First slide"> </div>'+    
                    
                    '</div>'+
                    '';
                    $("#carousel_images").append(carousel);
                    /**21-23 */
                } else if (data.img_1=="" && data.img_2!="" && data.img_3!="") {
                        var carousel = '' +
                        '<div class="carousel-inner" role="listbox">'+
                                 '<div class="carousel-item active"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_2+'" alt="First slide"> </div>'+    
                                '<div class="carousel-item"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_3+'" alt="First slide"> </div>'+    
                        
                        '</div>'+
                        '';
                        $("#carousel_images").append(carousel);
                        /** */
                    } else if (data.img_1 !="" && data.img_2 !="" && data.img_3 !="") {
                        var carousel = '' +
                        '<div class="carousel-inner" role="listbox">'+
                             '<div class="carousel-item active"> <img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_1+'" alt="First slide"> </div>'+
                             '<div class="carousel-item"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_2+'" alt="First slide"> </div>'+
                             '<div class="carousel-item"><img class="d-block w-100 stilo" src="../../admin/files/articulos/'+data.img_3+'" alt="First slide"> </div>'+
                        '</div>'+
                        '';
                        $("#carousel_images").append(carousel);
                        
                    }else{
                        $("#carousel_images").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                        '<strong>No hay registros!</strong> Puedes agregar uno desde tu administrador.' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>')
                    }

    })

}


init();