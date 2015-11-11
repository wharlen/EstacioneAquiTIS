<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao"></script>
	<script type="text/javascript">
	    var map;
	    $(document).ready(function () {
	        var latlng = new google.maps.LatLng(40.748492, -73.985496);
	        var myOptions = {
	            zoom: 15,
	            center: latlng,
	            mapTypeId: google.maps.MapTypeId.ROADMAP
	        };
	        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	            getLatLangFromAddress($("#txtAddress").val());

	    });

	    function getLatLangFromAddress(address) {
	        var geocoder;
	        geocoder = new google.maps.Geocoder();
	        geocoder.geocode({ 'address': address }, function(results, status) {
	            if (status == google.maps.GeocoderStatus.OK) {
	                //var latlng = { "Latitude": results[0].geometry.location.$a, "Longitude": results[0].geometry.location.ab };
	                var latlng = results[0].geometry.location;
	                $("#lat").html(latlng.lat());
	                $("#lon").html(latlng.lng());
	                placeMarker(latlng);
	            } else {
	                alert("Geocode was not successful for the following reason: " + status);
	            }
	        });   //geocoder
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
                map: map
            });

        }
	</script>
	<style type="text/css">
		html,body { height: 100%; margin: 0px; padding: 0px; }
		#map_canvas {
			width:600px;
			height:400px;
		}
		
		.text 
		{
		    border:1px solid black;
		    width:300px;
		}
		label 
		{
		    width:100px;
		}
	</style>
