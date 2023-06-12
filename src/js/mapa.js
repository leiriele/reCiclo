    //PONTOS FIXOS
	    var collectionPoints = [
	    { name: 'Ponto PAPEL', lat: -18.721930, lng: -47.524431 },
	    {name: 'Ponto Plastico', lat: -18.719719, lng: -47.509543},
	    { name: 'Ponto METAL', lat: -18.733951, lng: -47.489932 },
	    { name: 'Ponto OLEO', lat: -18.725342, lng: -47.488847 }
	    ];

	    function initMap() {
	    	var map = new google.maps.Map(document.getElementById('map'), {
	    		zoom: 12,
	    		center: { lat: -18.727, lng: -47.500 }
	    	});

	    	var geocoder = new google.maps.Geocoder();

	    	collectionPoints.forEach(function (point) {
	    		var marker = new google.maps.Marker({
	    			position: { lat: point.lat, lng: point.lng },
	    			map: map,
	    			title: point.name
	    		});

	    		var infoWindow = new google.maps.InfoWindow();
	      //caixinha em cima do ponto
	      geocoder.geocode({ 'location': { lat: point.lat, lng: point.lng } }, function (results, status) {
	      	if (status === 'OK') {
	      		if (results[0]) {
	      			var addressComponents = results[0].address_components;
	      			var streetName = getAddressComponent(addressComponents, 'route');
	      			var neighborhood = getAddressComponent(addressComponents, 'sublocality');
	      			var postalCode = getAddressComponent(addressComponents, 'postal_code');
	      			var content = '<strong>' + point.name + '</strong><br>' + streetName + ', ' + neighborhood + '<br>CEP: ' + postalCode + '<br><a href="#" onclick="openMap(' + point.lat + ', ' + point.lng + ');">Visualizar no mapa</a>';
	      			infoWindow.setContent(content);
	      		}
	      	}

	      	marker.addListener('click', function () {
	      		infoWindow.open(map, marker);
	      	});
	      });
	  });
	    }

	    function getAddressComponent(addressComponents, type) {
	    	for (var i = 0; i < addressComponents.length; i++) {
	    		var component = addressComponents[i];
	    		var componentTypes = component.types;
	    		if (componentTypes.indexOf(type) !== -1) {
	    			return component.long_name;
	    		}
	    	}
	    	return '';
	    }

	    function openMap(lat, lng) {
	    	var url = 'https://www.google.com/maps/search/?api=1&query=' + lat + ',' + lng;
	    	window.open(url, '_blank');
	    }