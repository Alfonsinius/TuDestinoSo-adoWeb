
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
//print_r($distanciaEuclidianaArray);

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
        $sitioTuristico = new SitioTuristico($mostrar['nombreDestino'], $mostrar['descripcion'], $distanciaEuclidiana, $mostrar['ubicacionX'], $mostrar['ubicacionY'], $mostrar['mapa']);
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
            <tr>

                <th style="color: white">Ruta 1</th>
                <th style="color: white">Ruta 1</th>


            </tr>
  <?php

  $d=0;
 
   foreach ($listaSitiosTuristicos as $prueba ) {
              if($d<7){
                echo "<tr><td width=\"10%\"><font face=\"verdana\" color=\"white\">" . $prueba->get_nombre()."<br>".$prueba->get_descripcion().
                 "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\" color=\"white\">" . $prueba->getMapa()
                . "</font></td>";
                 $d++;
              }else if($d==7){
                echo "<tr><td width=\"10%\"><font face=\"verdana\" color=\"white\">" ."Ruta 2" .
                 "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\" color=\"white\">" . "Ruta 2"
                . "</font></td>";
                 $d++;
              }else{
                   echo "<tr><td width=\"10%\"><font face=\"verdana\" color=\"white\">" . $prueba->get_nombre()."<br>".$prueba->get_descripcion().
                 "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\" color=\"white\">" . $prueba->getMapa()
                . "</font></td>";
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


