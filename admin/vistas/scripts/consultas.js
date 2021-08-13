var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrar_ornamentales();
    mostrar_planta();
    mostrar_flores();

	// $('#mEscritorio').addClass("treeview active");
    $('#lEscritorio').addClass("active");
}

//Función total plantas ornamentales.

function mostrar_ornamentales(){
   // console.log(id_most_ornamental);
    
	$.post("../ajax/consultas.php?op=mostrar_ornamentales",{

    }, function(data, status){
		data = JSON.parse(data);
        //alert(data);		

		$("#totalornamnetal").html(data.totalornamnetal);
 		//$("#idcolor").val(data.idcolor);

 	})
}


//Función total plantas arboles.
function mostrar_planta(){
    //console.log(id_mostrar_planta);
    
	$.post("../ajax/consultas.php?op=mostrar_arboles",{}, function(data, status){
		data = JSON.parse(data);
		// alert(data);

		$("#totalarboles").html(data.totalornamnetal);
 		//$("#idcolor").val(data.idcolor);

 	})
}


//Función total plantas flores.
function mostrar_flores(){
    //console.log(id_mostrar_flores);
    
	$.post("../ajax/consultas.php?op=mostrar_flores",{}, function(data, status){
		data = JSON.parse(data);
		

		$("#totalflores").html(data.totalornamnetal);
 		//$("#idcolor").val(data.idcolor);

 	})
}





init();