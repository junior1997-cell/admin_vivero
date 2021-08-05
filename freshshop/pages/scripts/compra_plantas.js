function init() {
    // Conseguir elemento
var idplanta_compra=localStorage.getItem("idplanta_compra");
//console.log(idplanta_compra);
ver_planta_compra(idplanta_compra);
};

function ver_planta_compra(idplanta_compra){
    //console.log(idplanta_compra);

    $.post("../../admin/ajax/vista_web.php?op=ver_planta_compra", {idplanta_compra : idplanta_compra}, function (data, status) {

        data = JSON.parse(data);
        /**nombre_planta
            vidadigital
         */
		$("#nombre_planta").html(data.nombre);

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

init();
