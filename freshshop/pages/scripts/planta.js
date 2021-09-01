//var comentario;
function init() {
    //Cargamos los items al select planta
    $.post("../../admin/ajax/vista_web.php?op=selectPlantaComent", function(r){
        $("#id_planta_coment").html(r);
        $('#id_planta_coment').selectpicker('refresh');

    });

    $("#formulario_coment").on("submit",function(e)
	{
		guardar(e);	
        //console.log('clik en el boton');
	})
   //listar();
    listar_categorias();
    listar_categorias_galery();

    listar_plnts_prncpal(0);

    listar_plnts_galery(0);




};
//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#sexo").val("");
	$("#id_planta_coment").val('default').selectpicker("refresh");
    $("#comentario").val("");
}

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
        // console.log(data);
        
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
    // console.log(id_categoria);

    $("#plants_galery").html('');
    $.post("../../admin/ajax/vista_web.php?op=listar_planta", { id_categoria: id_categoria }, function (data, status) {
        data = JSON.parse(data);
        // console.log(data);
        
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
//Función para guardar comentario

function guardar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	
	var formData = new FormData($("#formulario_coment")[0]);

	$.ajax({
		url: "../../admin/ajax/vista_web.php?op=guardar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	        //bootbox.alert(datos);
			if (datos == 'ok') {
			     $("#btnGuardar").prop("disabled",true);
                alert("Comentario registrado exitosamente");
                $('#recargar').click();
			}else{
                alert(datos);
			}	
          //  alert("muy bien")          
	        
	    }
        

	});
	limpiar();
    
}
function actualizarLaPagina(){
     
    window.location.reload();
} 

/*function listar(){

    $("#myList").html('');

    $.post("../../admin/ajax/vista_web.php?op=listar_comentarios", {}, function (data, status) { 
        data = JSON.parse(data);
        console.log(data);

        if (data.length) {
            var imagen="";
            $.each(data, function (index, value) {
                if (value.sexo ==1) {
                    imagen="avatar_varon.svg";
                } else {
                    imagen="avatar_mujer.svg";
                }

                var comentarios = '' +
                '<li>'+
                    '<div class="row">'+
                        '<div class="col-lg-1" style="padding-right: 0px;">'+
                            '<img class="profile-user-img img-responsive img-circle" src="../images/'+imagen+'" style="width: 70px;" alt="user">'+
                        '</div>'+
                        '<div class="col-lg-1"  style="padding-right: 0px;">'+
                            '<span class="username"><p style="margin-bottom: 0px !important;">'+value.nombre+'</p></span>'+
                            '<span class="description">'+value.fecha+'</span>'+
                        '</div>'+
                        '<div class="col-lg-10"  style="padding-right: 0px;">'+
                            '<p>'+value.comentario+'</p>'+
                        '</div>'+
                    '</div>'+
                '</li>'+
                
                '';
                
                $("#myList").append(comentarios);
            });
        } else {
            $("#myList").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" height: 50px; ">' +
                '<strong>No hay registros!</strong> Sin comentarios.' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>')
        }

    });
}*/



init();



