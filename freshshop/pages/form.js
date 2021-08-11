
document.querySelector('#submit').addEventListener('click',function(){
    
    let nombre = document.querySelector('#nombre').value;
    let precio = document.querySelector('#precio').value;
    let cantidad = document.querySelector('#cantidad').value;
    let c_preferencia = document.querySelector('#c_preferencia').value;

    //console.log(nombre+preciooo+cantidad+c_preferencia);

    let url = "https://api.whatsapp.com/send?phone=+51921487276&text=*__universidad Peruana Unión__*%0A*Vivero UPeU*%0A%0A*¿Nombre de la planta?*%0A" + nombre + "%0A*Precio por unidad*%0A" + precio + "%0A*Cantidad*%0A" + cantidad + "%0A*Color de preferencia*%0A" + c_preferencia + "%0A*¡Gracias por su preferencia!*%0A%0A*¡EN SEGUIDA CONFIRMAMOS SU PEDIDO!*%0A";
    window.open(url);

});