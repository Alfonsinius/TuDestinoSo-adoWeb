<?php

include './conexionBaseDeDatos.php';
include '../Data/SitioTuristico.php';





$tiempoSeleccionado = $_POST['selectTime'];
$distanciaSeleccionada = $_POST['selectDistance'];
$guardaDistancias;
$distanciaEuclidianaArray = array();
$distanciaEuclidianaArray = calculaDistanciaEuclidiana($distanciaSeleccionada, $tiempoSeleccionado);

function cmp($a, $b) {
    return $a->distanciaEuclidiana > $b->distanciaEuclidiana;
}

usort($distanciaEuclidianaArray, "cmp");
print_r($distanciaEuclidianaArray);

function calculaDistanciaEuclidiana($distancia, $tiempo) {
    $conexion = conexionBaseDeDatos();

    $sql = "SELECT * from destinos";
    $result = mysqli_query($conexion, $sql); //se "arma" la consulta a la base de datos, para esto le pasamos las credenciales y la consulta que queremos realizar
    $distanciaEuclidiana = 0;
    $listaSitiosTuristicos = array();

    $geoplugin = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=190.14.153.134' . $_SERVER['REMOTE_ADDR']));

    if (is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude'])) {

        $lat = $geoplugin['geoplugin_latitude'];
        $long = $geoplugin['geoplugin_longitude'];
    }

    while ($mostrar = mysqli_fetch_array($result)) {


        $distanciaEuclidiana = sqrt(pow((calculaDistanciaEnHoras($lat, $long, $mostrar['ubicacionX'], $mostrar['ubicacionY'])) - $distancia, 2) +
                pow((calculaTiempo($lat, $long, $mostrar['ubicacionX'], $mostrar['ubicacionY'])) - $tiempo, 2));
        $sitioTuristico = new SitioTuristico($mostrar['nombreDestino'], $mostrar['descripcion'], $mostrar['precio'], $mostrar['provincia'], $distanciaEuclidiana);
        array_push($listaSitiosTuristicos, $sitioTuristico);
    }



    return $listaSitiosTuristicos;
}

function calculaTiempo($lat1, $lon1, $lat2, $lon2) {
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;
    $r = 6372.797; // significa el radio de la tierra en KM
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
//echo ' '.$km; 
    return $km;
}

function calculaDistanciaEnHoras($lat1, $lon1, $lat2, $lon2) {
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lon1 *= $pi80;
    $lat2 *= $pi80;
    $lon2 *= $pi80;
    $r = 6372.797; // significa el radio de la tierra en KM
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $speed = 50;
    $km = $r * $c;
//echo ' '.$km; 
    $time = $km / $speed;
    return $time;
}
?>


