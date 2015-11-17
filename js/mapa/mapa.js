var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var options = {
        zoom: 10,
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
				title: "Casa com"+"vagas",
				icon: 'img/iconeazul.png'
			});
			if(ponto.cs_seguro=="S")
				var seguro = "Sim";
			else
				var seguro = "Não";
			if(ponto.cs_animal=="S")
				var animal = "Sim";
			else
				var animal = "Não";

			var myOptions = {
				content: "<p>Endereço " + ponto.cs_endereco +", "+ ponto.cs_bairro+", "+ponto.cs_numero +" - "+ ponto.cs_cep+
				"</p><p><img src='img/animal.png' alt='Seguro residencial'>Seguro residencial:"+seguro+"</p><p><img src='img/seguro.png' alt='Seguro residencial'>Presença de animal:"+animal+"</p><p>Há "+
				ponto.qtd_vagas+" vagas disponiveis nessa casa</p>"+"<p><a href='detalhes.php?tipo=CS&cod="
				+ponto.cs_codigo+"'>Ver detalhes da casa</a></p>",
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