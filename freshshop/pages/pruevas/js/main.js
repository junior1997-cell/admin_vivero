function initMap() {
const ubication = new localizacion(()=>{
	const option ={
		center:{
			lat:ubication.latitude,
			lng:ubication.longitude
		},
		zoom:19
	}

	var map =document.getElementById('map')

	const mapa  = new google.maps.Map(map,option);
});
	
}



