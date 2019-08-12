function initialize() {
	var latlng = new google.maps.LatLng(-34.903489,-57.938062); // latitudes en las que me quiero posicionar
	var myOptions = {
	  zoom: 14,
	  center: latlng,                                           // centraliza el mapa en las latitudes dadas
	  mapTypeId: google.maps.MapTypeId.ROADMAP                  //indicador del mapa a utilizar
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	var image = 'image/ubicacion.png';
	var marker = new google.maps.Marker({                       //creador del marcador
		position: latlng,
		map: map,
		icon: image,
		title:"Inmobiliaria Madelon"
	});
}			