<!DOCTYPE html>
<html>
<head>
	<title>Rutas turisticas</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div id="map"></div>
<script >function iniciarMap(){

    
    var coord = {lat:-34.5956145 ,lng: -58.4431949};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlEMxfe87f5aflWarA7IuvtVKmYzzc970&callback=iniciarMap"></script>
</body>
</html>