<?php
require'header_c.php';
?>


    <link rel="stylesheet" href="../css/carrito.css">

	<div class="box-add">
		<div class="container">
			<div class="row  classrow">
				<div class="col-lg-1 col-md-2 col-sm-12 entornodiv">
					<div class="imgpequeño ecfecto " id="imagenesP">
						<center>
							<img src="../images/upeu/panameñas.png" id="image1">
					    </center>
					</div>
					
				</div>
				<div class="col-lg-7 col-md-10 col-sm-12">
					<div class="imgestilo">
						<center>
							<figure>
							<img id="panameñas" src="../images/upeu/panameñas.png" title="Vida Verde">
							</figure>
					    </center>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12 rowww divhead">
					
					<center>
						<span id="nombre_pl">Panameñas</span>
						<form>
							<div class="precio">
						<hr>						
						<h4 class="h2" id="precio">S/ 20.00</h4>
					
							<div style="margin: 35px;">

								 <label for="cantidad" class="formulario__label">Cantidad</label>
		       					 <input id="cantidad" onkeyup="mostrar()" type="text" class="formulario__input" maxlength="4" onkeypress='return validaNumericos(event)' required>
								<span id="cantlocal" class="cantlocal"  hidden></span>
							</div>

							<div style="margin: 15px;">

								<button id="submit" class="btn btn-success">Enviar al whatsapp</button>
								
							</div>
							

						</form>
					</center>
				</div>
			</div>
			<div class="row my-5">
                <div class="col-sm-6 col-lg-6">
                    <div class="service-block-inner">
                        <h3><b>Detalle De La Planta</b></h3>
                        <p>Desarrollar personas <b>integras</b>, con espíritu de servicio <b>misionero</b> e <b>innovadoras</b> a fin de restaurar la imagen de Dios en el ser humano </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="service-block-inner">
                        <h3><b>Especifcaciones y Cuidado</b></h3>
                        <p>Ser referente por la  excelencia en el servicio <b>misionero</b>  y la <b>calidad</b> educativa e <b>innovadora</b> en la iglesia y la sociedad.” </p>
                    </div>
                </div>
            </div>	
		</div>		
    </div>
	</div>

	


<?php
require'footer_c.php';
?>
<script type="text/javascript" src="carrito/js/c_crotos.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">	

	function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 58){
      return true;
     }
     return false;        
}

function mostrar() {
 var x = $("#cantidad").val();
 document.getElementById('cantlocal').innerHTML = x;
 //alert(x);
}
	
document.querySelector('#submit').addEventListener('click',function(){

    
    var nombre_planta = document.getElementById("nombre_pl").innerText;
    var cantidad = document.getElementById("cantlocal").innerText;
    var precio =  document.getElementById("precio").innerText;
  // alert(precio);


    let url = "https://api.whatsapp.com/send?phone=+51921903945&text=*_universidad Peruana Unión_*%0A*Vivero UPeU*%0A%0A*¿Nombre de la planta?*%0A" + nombre_planta + "%0A*Cantidad*%0A" + cantidad + "%0A*precio por unidad*%0A"  + precio + "%0A*¡Gracias por su preferencia!*%0A";
    window.open(url);


});
</script>



