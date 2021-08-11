class localizacion{
	constructor(callback){
	//nos permitira obtener nuestra localizacion actual
		if (navigator.geolocation) {//si este  objeto existe obtenmos la ubicacion

			navigator.geolocation.getCurrentPosition((position)=>{
				this.latitude =position.coords.latitude;
				this.longitude =position.coords.longitude;

				callback();
			});
		}else{
			alert("Tu navegador no soporta geolocalización")
		}
	}
}