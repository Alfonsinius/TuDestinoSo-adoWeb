
<!--<p id="locationLongitude"></p>
<p id="locationLatitude"></p>
<p id="x"></p>-->


<script>
  /*  var xLatitude = document.getElementById("locationLongitude");
    var xLongitude = document.getElementById("locationLatitude");
    var x = document.getElementById("x");

    function getLocationLongitude() {

        navigator.geolocation.getCurrentPosition(showPositionLongitude);

    }

    function getLocationLatitude() {

        navigator.geolocation.getCurrentPosition(showPositionLatitude);

    }
    function showPositionLongitude(position) {
        xLongitude.innerHTML = position.coords.longitude;
      
    }

    function showPositionLatitude(position) {
        xLatitude.innerHTML = position.coords.latitude;


    }

    function comprueba() {


        getLocationLongitude();




    }

    comprueba();
*/

</script>



<?php
 
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=190.14.153.134' . $_SERVER['REMOTE_ADDR']) );
 
if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
 
	$lat = $geoplugin['geoplugin_latitude'];
	$long = $geoplugin['geoplugin_longitude'];
	
	
 echo $lat;
 echo $long;

}
 
?>