

<script type="text/javascript">
 $(document).ready(function () {

	         $("#btnGo").click(function () {
	            getLatLangFromAddress($("#txtAddress").val());
	        }); 
	    });


function initMap() {
  var map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 6,
    center: {lat: parseFloat(document.getElementById('latitude').value), lng: parseFloat(document.getElementById('longitude').value)}
  });
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;

    geocodeLatLng(geocoder, map, infowindow);
 
}

function geocodeLatLng(geocoder, map, infowindow) {
  var lat = document.getElementById('latitude').value;
  var lng = document.getElementById('longitude').value;
  var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
  geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(15);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          icon: 'img/iconeazul.png'
        });

        infowindow.setContent(results[1].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}
/*AQUI É INSTANCIADA UMA NOVA CLASSE DO MAPS PARA ATUALIZAR NOVO ENDEREÇO SEMPRE Q SOLICITADO*/
  function getLatLangFromAddress(address) {
	        var regeocoder;
	        regeocoder = new google.maps.Geocoder();
	        regeocoder.geocode({ 'address': address }, function(results, status) {
	            if (status == google.maps.GeocoderStatus.OK) {
	                var latlng = { "Latitude": results[0].geometry.location.$a, "Longitude": results[0].geometry.location.ab };
	                var latlng = results[0].geometry.location;
	                $("#latitude").val(latlng.lat());
	                $("#longitude").val(latlng.lng());
	                placeMarker(latlng);
	            } else {
	                alert("Geocode não obteve sucesso pela seguinte razão: " + status);
	            }
	        }); 
        }

 function placeMarker(latlng) {
            var location = new google.maps.LatLng(latlng.lat(), latlng.lng());

            var myOptions = {
                zoom: 15,
                center: location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            var marker = new google.maps.Marker({
                position: location,
                icon: 'img/iconeazul.png',
                map: map
            });

        }   

	</script>
