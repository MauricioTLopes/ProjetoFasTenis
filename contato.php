<!doctype html>
<html lang="pt-br">
	<head >
		<meta charset="utf-8">
		<title>Fornecedora FasTenis</title>
		<link rel="stylesheet" href="estilos.css"/>
	</head>
	<body>
		<header>
			<?php
				include "topo.php"
			?>
		</header>
		
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
	<div style='overflow:hidden;height:500px;width:700px;'>
	<div id='gmap_canvas' style='height:500px;width:700px;'>
	</div>
	<div><small><a href="http://embedgooglemaps.com">embed google map</a></small></div>
	<div><small><a href="http://www.proxysitereviews.com /categories/scrapebox-proxies/">scrapebox proxies</a></small>
	</div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
	</div><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(-3.7441952,-38.535847200000035),mapTypeId: google.maps.MapTypeId.ROADMAP};
		map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-3.7441952,-38.535847200000035)});
		infowindow = new google.maps.InfoWindow({content:'<strong>IFCE-FORTALEZA</strong><br>13 de Maio, 2081 - Fatima, Fortaleza - CE, 60040-531<br>'});
		google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
	</script>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<footer>
			<?php
				include "rodape.html";
			?>
		</footer>
		
	</body>
</html>