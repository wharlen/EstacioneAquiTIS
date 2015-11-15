var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var options = {
        zoom: 6,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos() {
	
	$.getJSON('/tis4/pontos.json.php', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos.pontos, function(index, ponto) {
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(jQuery.parseJSON(ponto.cs_latitude), jQuery.parseJSON(ponto.cs_longitude)),
				title: "Meu ponto personalizado! :-D",
				icon: 'img/marcador_small.png'
			});
			
			var myOptions = {
				content: "<p>" + ponto.cs_endereco + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
        	};

			infoBox[ponto.cs_codigo] = new InfoBox(myOptions);
			infoBox[ponto.cs_codigo].marker = marker;
			
			infoBox[ponto.cs_codigo].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.cs_codigo, marker);
			});
			
			markers.push(marker);
			
			latlngbounds.extend(marker.position);
			
		});
		
		var markerCluster = new MarkerClusterer(map, markers);
		
		map.fitBounds(latlngbounds);
		
	});
	
}

carregarPontos();