function init() {
    // Conseguir elemento
var idplanta_compra=localStorage.getItem("idplanta_compra");
//console.log(idplanta_compra);
ver_planta_compra(idplanta_compra);
formulario_what(idplanta_compra)

//Cargamos los items al select COLOR
$.post("../../admin/ajax/articulo.php?op=selectColor", function(r){
    $("#idcolor").html(r);
    $('#idcolor').selectpicker('refresh');

});

};


function ver_planta_compra(idplanta_compra){
    //console.log(idplanta_compra);

    $.post("../../admin/ajax/vista_web.php?op=ver_planta_compra", {idplanta_compra : idplanta_compra}, function (data, status) {

        data = JSON.parse(data);
        /**           					
        *
         */
         $("#nombre_v").html(data.nombre);
         $("#nombre").val(data.nombre);
         $("#precio_v").html(data.precio_venta);
         $("#precio").val(data.precio_venta);
             /**1-2-3 */
            if (data.img_1 !="" && data.img_2=="" && data.img_3=="") {
                var secc_img_p = ''+
                '<center>'+
                    '<img src="../../admin/files/articulos/'+data.img_1+'" id="image1">'+
                '</center>'+
                '';
                $("#img_peque").append(secc_img_p);
                
                document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_1+'';
                // El selector deseado
                var brandImg = document.querySelectorAll("#img_peque img");

                for (var i = 0; i < brandImg.length; i++) {
                var ckEdiloop = brandImg[i];
                ckEdiloop.addEventListener("click", function(el){
                    var thisSrc = this.src;
                    var srcall = thisSrc.substring(0,90);
                // alert(srcall);
                    document.getElementById("vidadigital").src =srcall;
                    
                });
                }

                 } else if (data.img_1=="" && data.img_2!="" && data.img_3=="") {
                var secc_img_p = ''+
                '<center>'+
                    '<img src="../../admin/files/articulos/'+data.img_2+'" id="image1">'+
                '</center>'+
                '';
                $("#img_peque").append(secc_img_p);

                document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_2+'';
                // El selector deseado
                var brandImg = document.querySelectorAll("#img_peque img");

                for (var i = 0; i < brandImg.length; i++) {
                var ckEdiloop = brandImg[i];
                ckEdiloop.addEventListener("click", function(el){
                    var thisSrc = this.src;
                    var srcall = thisSrc.substring(0,90);
                // alert(srcall);
                    document.getElementById("vidadigital").src =srcall;
                    
                });
                }

                }else if (data.img_1=="" && data.img_2=="" && data.img_3!="") {
                    var secc_img_p = ''+
                    '<center>'+
                        '<img src="../../admin/files/articulos/'+data.img_3+'" id="image1">'+
                    '</center>'+
                    '';
                    $("#img_peque").append(secc_img_p);

                    document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_3+'';
                    // El selector deseado
                    var brandImg = document.querySelectorAll("#img_peque img");
    
                    for (var i = 0; i < brandImg.length; i++) {
                    var ckEdiloop = brandImg[i];
                    ckEdiloop.addEventListener("click", function(el){
                        var thisSrc = this.src;
                        var srcall = thisSrc.substring(0,90);
                    // alert(srcall);
                        document.getElementById("vidadigital").src =srcall;
                        
                    });
                    }

                    /**12--13 */
                }else if (data.img_1!="" && data.img_2!="" && data.img_3=="") {
                        var secc_img_p = ''+
                        '<center>'+
                            '<img src="../../admin/files/articulos/'+data.img_1+'" id="image1">'+
                            '<img src="../../admin/files/articulos/'+data.img_2+'" id="image1">'+
                        '</center>'+
                        '';
                        $("#img_peque").append(secc_img_p);
                        
                    document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_1+'';
                    // El selector deseado
                    var brandImg = document.querySelectorAll("#img_peque img");
    
                    for (var i = 0; i < brandImg.length; i++) {
                    var ckEdiloop = brandImg[i];
                    ckEdiloop.addEventListener("click", function(el){
                        var thisSrc = this.src;
                        var srcall = thisSrc.substring(0,90);
                    // alert(srcall);
                        document.getElementById("vidadigital").src =srcall;
                        
                    });
                    }
                    }else if (data.img_1!="" && data.img_2=="" && data.img_3!="") {
                        var secc_img_p = ''+
                        '<center>'+
                            '<img src="../../admin/files/articulos/'+data.img_1+'" id="image1">'+
                            '<img src="../../admin/files/articulos/'+data.img_3+'" id="image1">'+
                        '</center>'+
                        '';
                        $("#img_peque").append(secc_img_p);
                                                
                    document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_1+'';
                    // El selector deseado
                    var brandImg = document.querySelectorAll("#img_peque img");
    
                    for (var i = 0; i < brandImg.length; i++) {
                    var ckEdiloop = brandImg[i];
                    ckEdiloop.addEventListener("click", function(el){
                        var thisSrc = this.src;
                        var srcall = thisSrc.substring(0,90);
                    // alert(srcall);
                        document.getElementById("vidadigital").src =srcall;
                        
                    });
                    }
                        /**21-23 */
                    } else if (data.img_1=="" && data.img_2!="" && data.img_3!="") {
                            var secc_img_p = ''+
                            '<center>'+
                                '<img src="../../admin/files/articulos/'+data.img_2+'" id="image1">'+
                                '<img src="../../admin/files/articulos/'+data.img_3+'" id="image1">'+
                            '</center>'+
                            '';
                            $("#img_peque").append(secc_img_p);
                                                    
                    document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_2+'';
                    // El selector deseado
                    var brandImg = document.querySelectorAll("#img_peque img");
    
                    for (var i = 0; i < brandImg.length; i++) {
                    var ckEdiloop = brandImg[i];
                    ckEdiloop.addEventListener("click", function(el){
                        var thisSrc = this.src;
                        var srcall = thisSrc.substring(0,90);
                    // alert(srcall);
                        document.getElementById("vidadigital").src =srcall;
                        
                    });
                    }
                            /** */
                        } else if (data.img_1 !="" && data.img_2 !="" && data.img_3 !="") {
                            var secc_img_p = ''+
                            '<center>'+
                                '<img src="../../admin/files/articulos/'+data.img_1+'" id="image1">'+
                                '<img src="../../admin/files/articulos/'+data.img_2+'" id="image1">'+
                                '<img src="../../admin/files/articulos/'+data.img_3+'" id="image1">'+
                            '</center>'+
                            '';
                            $("#img_peque").append(secc_img_p);
                                                    
                            document.getElementById("vidadigital").src ='../../admin/files/articulos/'+data.img_1+'';
                            // El selector deseado
                            var brandImg = document.querySelectorAll("#img_peque img");
            
                            for (var i = 0; i < brandImg.length; i++) {
                            var ckEdiloop = brandImg[i];
                            ckEdiloop.addEventListener("click", function(el){
                                var thisSrc = this.src;
                                var srcall = thisSrc.substring(0,90);
                            // alert(srcall);
                                document.getElementById("vidadigital").src =srcall;
                                
                            });
                            }
                            
                        }else{
                            $("#img_peque").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                            '<strong>No hay registros!</strong> Puedes agregar uno desde tu administrador.' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>')
                        }
    

    })

}

document.querySelector('#submit').addEventListener('click',function(){
    
    let nombre = document.querySelector('#nombre').value;
    let precio = document.querySelector('#precio').value;
    let cantidad = document.querySelector('#cantidad').value;
    let c_preferencia = document.querySelector('#c_preferencia').value;

    //console.log(nombre+preciooo+cantidad+c_preferencia);
        // Guardar
        localStorage.setItem("nombre......", nombre);

    let url = "https://api.whatsapp.com/send?phone=+51921487276&text=*__universidad Peruana Unión__*%0A*Vivero UPeU*%0A%0A*¿Nombre de la planta?*%0A" + nombre + "%0A*Precio por unidad*%0A" + precio + "%0A*Cantidad*%0A" + cantidad + "%0A*Color de preferencia*%0A" + c_preferencia + "%0A*¡Gracias por su preferencia!*%0A%0A*¡EN SEGUIDA CONFIRMAMOS SU PEDIDO!*%0A";
    window.open(url);

});

init();