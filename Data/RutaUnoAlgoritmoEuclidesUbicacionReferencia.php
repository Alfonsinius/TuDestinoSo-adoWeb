<?php

include './conexionBaseDeDatos.php';
include '../Data/SitioTuristico.php';
//$ubicacionPredeterminadaGeneral = $_POST['selectGeneralLocation'];
//$ubicacionPredeterminadaEspecifica = $_POST['selectSpecificLocation'];
$tiempoSeleccionado = $_POST['selectTime'];
$distanciaSeleccionada = $_POST['selectDistance'];

$entro = true; //variable de condición para guardar el primer dato y después comenzar a comparar 
$guardaDistancias;
$ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];
$ubicacionPredeterminadaGeneral = $_POST["selectSpecificLocation"];


$distanciaEuclidianaArray = array();
$distanciaEuclidianaArray = calculaDistanciaEuclidiana($distanciaSeleccionada, $tiempoSeleccionado, $ubicacionPredeterminadaEspecifica);

function cmp($a, $b) {
    return $a->distanciaEuclidiana > $b->distanciaEuclidiana;
}

usort($distanciaEuclidianaArray, "cmp");
print_r($distanciaEuclidianaArray);

function calculaDistanciaEuclidiana($distancia, $tiempo, $lugar) {
    $conexion = conexionBaseDeDatos();

    $sql = "SELECT * from destinos";
    $result = mysqli_query($conexion, $sql); //se "arma" la consulta a la base de datos, para esto le pasamos las credenciales y la consulta que queremos realizar
    $distanciaEuclidiana = 0;
    $listaSitiosTuristicos = array();


    if ($lugar == 1) {
        $coordenadasLatitude = 9.864396;
        $coordenadasLongitud = -83.912820;
    } else if ($lugar == 2) {
        $coordenadasLatitude = 9.864446;
        $coordenadasLongitud = -83.919713;
    } else if ($lugar == 3) {
        $coordenadasLatitude = 9.865522;
        $coordenadasLongitud = -83.926991;
    }


    while ($mostrar = mysqli_fetch_array($result)) {

      
        $distanciaEuclidiana = sqrt(pow((calculaDistanciaEnHoras($coordenadasLatitude, $coordenadasLongitud, $mostrar['ubicacionX'], $mostrar['ubicacionY'])) - $distancia, 2) +
                pow((calculaTiempo($coordenadasLatitude, $coordenadasLongitud, $mostrar['ubicacionX'], $mostrar['ubicacionY'])) - $tiempo, 2));
          $sitioTuristico = new SitioTuristico($mostrar['nombreDestino'], $mostrar['descripcion'],$mostrar['precio'],$mostrar['provincia'], $distanciaEuclidiana);
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




/*echo 'Distancia seleccionada' . $distanciaSeleccionada . 'Tiempo seleccionado' . $tiempoSeleccionado .
 'ubicacionPredeterminadaESPECIFA' . $ubicacionPredeterminadaEspecifica . 'UbicacionPredeterminadaGeneral' . $ubicacionPredeterminadaGeneral;*/



