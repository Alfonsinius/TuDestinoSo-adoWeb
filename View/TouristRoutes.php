
<?php
include '../View/MenuLogedInUser.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#273746;">

<?php

include '../Data/conexionBaseDeDatos.php';
include '../Data/SitioTuristico.php';
//$ubicacionPredeterminadaGeneral = $_POST['selectGeneralLocation'];
//$ubicacionPredeterminadaEspecifica = $_POST['selectSpecificLocation'];
$tiempoSeleccionado = $_GET['tiempo'];
$distanciaSeleccionada = $_GET['distancia'];

$entro = true; //variable de condición para guardar el primer dato y después comenzar a comparar 
$guardaDistancias;
$ubicacionPredeterminadaEspecifica = $_GET["lugar"];
//$ubicacionPredeterminadaGeneral = $_POST["selectSpecificLocation"];
      

  
 $distanciaEuclidianaArray = array();
$distanciaEuclidianaArray = calculaDistanciaEuclidiana($distanciaSeleccionada, $tiempoSeleccionado, $ubicacionPredeterminadaEspecifica);

function cmp($a, $b) {
    return $a->distanciaEuclidiana > $b->distanciaEuclidiana;
}

//usort($distanciaEuclidianaArray, "cmp");
 
//print_r($distanciaEuclidianaArray);

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
        $sitioTuristico = new SitioTuristico($mostrar['nombreDestino'], $mostrar['descripcion'], $distanciaEuclidiana, $coordenadasLatitude, $coordenadasLongitud, $mostrar['mapa']);
        array_push($listaSitiosTuristicos, $sitioTuristico);
    }
   ?>
    
    
  <table class="table" >
        <thead>
            <tr>

                <th style="color: white">Nombre</th>
                <th style="color: white">Mapa</th>


            </tr>
        </thead>
        <tbody  >
  <?php
  $d=1;
   foreach ($listaSitiosTuristicos as $prueba ) {
              if($d<8){
                echo "<tr><td width=\"10%\"><font face=\"verdana\" color=\"white\">" . $prueba->get_nombre()."<br>".$prueba->get_descripcion().
                 "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\" color=\"white\">" . $prueba->getMapa()
                . "</font></td>";
                 $d++;
              }else{
                  $d++;
              }
            }
            ?>
            
               </tbody>
    </table>
    
            <?php
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
       