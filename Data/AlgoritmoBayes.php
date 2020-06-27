<?php

include './conexionBaseDeDatos.php';
include '../Data/SitioTuristico.php';
$tiempoSeleccionado = $_POST['selectTime'];
$distanciaSeleccionada = $_POST['selectDistance'];
$ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

function llenarDatosDistanciaTiempo($distancia, $tiempo, $lugar) {

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


    $conexion = conexionBaseDeDatos();
    $sql = "SELECT * from destinos";
    $result = mysqli_query($conexion, $sql); //se "arma" la consulta a la base de datos, para esto le pasamos las credenciales y la consulta que queremos realizar
    $listaSitiosTuristicos = array();
    $listaSitiosTuristicos = listaLugares();
    $tamanoLista = count($listaSitiosTuristicos);


    while ($mostrar = mysqli_fetch_array($result)) {

        foreach ($listaSitiosTuristicos as $sitioTuristico) {

            $tiempo = calculaDistanciaEnHoras($coordenadasLatitude, $coordenadasLongitud, $sitioTuristico->latitud, $sitioTuristico->longitud);
            $distancia = calculaDistancia($coordenadasLatitude, $coordenadasLongitud, $sitioTuristico->latitud, $sitioTuristico->longitud);

            $SQLinsertTiempo = "UPDATE destinos SET tiempo = '$tiempo', distancia = '$distancia' WHERE nombreDestino = '$sitioTuristico->nombre'";

            if ($conexion->query($SQLinsertTiempo) === TRUE) {
                // echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conexion->error;
            }
        }

        // print_r($listaSitiosTuristicos);
        // $sitioTuristico = new SitioTuristico($mostrar['distancia'], $mostrar['tiempo']);
        //   array_push($listaSitiosTuristicos, $sitioTuristico);
    }
}

function listaLugares() {
    $conexion = conexionBaseDeDatos();

    $sql = "SELECT * from destinos";
    $result = mysqli_query($conexion, $sql); //se "arma" la consulta a la base de datos, para esto le pasamos las credenciales y la consulta que queremos realizar
    $distanciaEuclidiana = 0;
    $listaSitiosTuristicos = array();



    while ($mostrar = mysqli_fetch_array($result)) {

        $sitioTuristico = new SitioTuristico($mostrar['nombreDestino'], $mostrar['descripcion'], $mostrar['tiempo'], $mostrar['distancia'], $mostrar['ubicacionX'], $mostrar['ubicacionY']);
        array_push($listaSitiosTuristicos, $sitioTuristico);
    }



    return $listaSitiosTuristicos;
}

function calculaDistancia($lat1, $lon1, $lat2, $lon2) {
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

llenarDatosDistanciaTiempo($tiempoSeleccionado, $distanciaSeleccionada, $ubicacionPredeterminadaEspecifica);
echo generaTablaParaVolcanIrazu();
echo generaTablaParaParqueFrancia();
echo generaTablaParaMercadoMunicipal();
echo generaTablaParaMuseoBancoCentral();
echo generaTablaParaMuseoDeLosNinos();

function generaTablaParaVolcanIrazu() {

    $tiempoSeleccionado = $_POST['selectTime'];
    $distanciaSeleccionada = $_POST['selectDistance'];
    $ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

    $conexion1 = conexionBaseDeDatos();

    $SQLnc1KmVolcanIrazu = "SELECT count(distancia) AS nc1KmDistancia FROM destinos WHERE distancia < 1 AND nombreDestino = 'Volcan Irazú'";
    $SQLnc4KmVolcanIrazu = "SELECT count(distancia) AS nc4KmDistancia FROM destinos WHERE distancia >= '1' AND distancia <'8' AND nombreDestino = 'Volcan Irazú'";
    $SQLnc8KmVolcanIrazu = "SELECT count(distancia) AS nc8KmDistancia FROM destinos WHERE distancia >= '8' AND distancia <'16' AND nombreDestino = 'Volcan Irazú'";
    $SQLncMas16KmVolcanIrazu = "SELECT count(distancia) AS nc16KmDistancia FROM destinos WHERE distancia >= '16' AND nombreDestino = 'Volcan Irazú'";
    $SQLnVolcanIrazu = "SELECT count(nombreDestino) AS nVolcanIrazu FROM destinos WHERE nombreDestino = 'Volcan Irazú'";


    $result0 = mysqli_query($conexion1, $SQLnVolcanIrazu);
    $values0 = mysqli_fetch_assoc($result0);
    $nVolcanIrazu = $values0['nVolcanIrazu'];

    $result1 = mysqli_query($conexion1, $SQLnc4KmVolcanIrazu);
    $values1 = mysqli_fetch_assoc($result1);
    $nc4KmVolcanIrazu = $values1['nc4KmDistancia'];

    $result2 = mysqli_query($conexion1, $SQLnc8KmVolcanIrazu);
    $values2 = mysqli_fetch_assoc($result2);
    $nc8KmVolcanIrazu = $values2['nc8KmDistancia'];

    $result3 = mysqli_query($conexion1, $SQLncMas16KmVolcanIrazu);
    $values3 = mysqli_fetch_assoc($result3);
    $nc16KmVolcanIrazu = $values3['nc16KmDistancia'];

    $result4 = mysqli_query($conexion1, $SQLnc1KmVolcanIrazu);
    $values4 = mysqli_fetch_assoc($result4);
    $nc1KmVolcanIrazu = $values4['nc1KmDistancia'];


    $p = 1 / 4; //es la cantidad de valores que puede tomar un atributo en este caso es 4 para todos
    $m = 2; //es a cantidad de atributos en este caso es 2

    $SQLcuentaRegistrosDistancia = 'SELECT COUNT(*) as cuentaRegistrosDistancia FROM destinos'; //se cuentan la cantidad de registros
    $result23 = mysqli_query($conexion1, $SQLcuentaRegistrosDistancia);
    $values23 = mysqli_fetch_assoc($result23);
    $registrosTotalesDistancia = $values23['cuentaRegistrosDistancia'];


    $pClassVolcanIrazu = $nVolcanIrazu / $registrosTotalesDistancia; //este dato también es necesario para el algoritmo (es la cantidad de veces que aparece esta clase dividido entre la cantidad de registros totales)
    //formula 
    //se arma la ecuación para hallar cada una de las probabilidades
    $calculoBayesVolcanIrazu1Km = ($nc1KmVolcanIrazu + $m * $p) / ($nVolcanIrazu + $m);
    $calculoBayesVolcanIrazu4Km = ($nc4KmVolcanIrazu + $m * $p) / ($nVolcanIrazu + $m);
    $calculoBayesVolcanIrazu8Km = ($nc8KmVolcanIrazu + $m * $p) / ($nVolcanIrazu + $m);
    $calculoBayesVolcanIrazu16Km = ($nc16KmVolcanIrazu + $m * $p) / ($nVolcanIrazu + $m);



    //ahora que tenemos todos los datos se realiza la multiplicación (como se indica en el documento)
    $calculoFinalParaVolcanIrazu = $pClassVolcanIrazu * $calculoBayesVolcanIrazu1Km * $calculoBayesVolcanIrazu4Km * $calculoBayesVolcanIrazu8Km * $calculoBayesVolcanIrazu16Km;

    //se obtiene el resultado de la probabilidad final para esa la clase volcanIrazu
    return $calculoFinalParaVolcanIrazu;
}

function generaTablaParaParqueFrancia() {

    $tiempoSeleccionado = $_POST['selectTime'];
    $distanciaSeleccionada = $_POST['selectDistance'];
    $ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

    $conexion1 = conexionBaseDeDatos();

    $SQLnc1KmParqueFrancia = "SELECT count(distancia) AS nc1KmDistancia FROM destinos WHERE distancia < 1 AND nombreDestino = 'Parque Francia'";
    $SQLnc4KmParqueFrancia = "SELECT count(distancia) AS nc4KmDistancia FROM destinos WHERE distancia >= '1' AND distancia <'8' AND nombreDestino = 'Parque Francia'";
    $SQLnc8KmParqueFrancia = "SELECT count(distancia) AS nc8KmDistancia FROM destinos WHERE distancia >= '8' AND distancia <'16' AND nombreDestino = 'Parque Francia'";
    $SQLncMas16KmParqueFrancia = "SELECT count(distancia) AS nc16KmDistancia FROM destinos WHERE distancia >= '16' AND nombreDestino = 'Parque Francia'";
    $SQLnParqueFrancia = "SELECT count(nombreDestino) AS nParqueFrancia FROM destinos WHERE nombreDestino = 'Parque Francia'";


    $result0 = mysqli_query($conexion1, $SQLnParqueFrancia);
    $values0 = mysqli_fetch_assoc($result0);
    $nParqueFrancia = $values0['nParqueFrancia'];

    $result1 = mysqli_query($conexion1, $SQLnc4KmParqueFrancia);
    $values1 = mysqli_fetch_assoc($result1);
    $nc4KmParqueFrancia = $values1['nc4KmDistancia'];

    $result2 = mysqli_query($conexion1, $SQLnc8KmParqueFrancia);
    $values2 = mysqli_fetch_assoc($result2);
    $nc8KmParqueFrancia = $values2['nc8KmDistancia'];

    $result3 = mysqli_query($conexion1, $SQLncMas16KmParqueFrancia);
    $values3 = mysqli_fetch_assoc($result3);
    $nc16KmParqueFrancia = $values3['nc16KmDistancia'];

    $result4 = mysqli_query($conexion1, $SQLnc1KmParqueFrancia);
    $values4 = mysqli_fetch_assoc($result4);
    $nc1KmParqueFrancia = $values4['nc1KmDistancia'];


    $p = 1 / 4; //es la cantidad de valores que puede tomar un atributo en este caso es 4 para todos
    $m = 2; //es a cantidad de atributos en este caso es 2

    $SQLcuentaRegistrosDistancia = 'SELECT COUNT(*) as cuentaRegistrosDistancia FROM destinos'; //se cuentan la cantidad de registros
    $result23 = mysqli_query($conexion1, $SQLcuentaRegistrosDistancia);
    $values23 = mysqli_fetch_assoc($result23);
    $registrosTotalesDistancia = $values23['cuentaRegistrosDistancia'];


    $pClassParqueFrancia = $nParqueFrancia / $registrosTotalesDistancia; //este dato también es necesario para el algoritmo (es la cantidad de veces que aparece esta clase dividido entre la cantidad de registros totales)
    //formula 
    //se arma la ecuación para hallar cada una de las probabilidades
    $calculoBayesParqueFrancia1Km = ($nc1KmParqueFrancia + $m * $p) / ($nParqueFrancia + $m);
    $calculoBayesParqueFrancia4Km = ($nc4KmParqueFrancia + $m * $p) / ($nParqueFrancia + $m);
    $calculoBayesParqueFrancia8Km = ($nc8KmParqueFrancia + $m * $p) / ($nParqueFrancia + $m);
    $calculoBayesParqueFrancia16Km = ($nc16KmParqueFrancia + $m * $p) / ($nParqueFrancia + $m);



    //ahora que tenemos todos los datos se realiza la multiplicación (como se indica en el documento)
    $calculoFinalParaParqueFrancia = $pClassParqueFrancia * $calculoBayesParqueFrancia1Km * $calculoBayesParqueFrancia4Km * $calculoBayesParqueFrancia8Km * $calculoBayesParqueFrancia16Km;

    //se obtiene el resultado de la probabilidad final para esa la clase volcanIrazu
    return $calculoFinalParaParqueFrancia;
}

function generaTablaParaMercadoMunicipal() {

    $tiempoSeleccionado = $_POST['selectTime'];
    $distanciaSeleccionada = $_POST['selectDistance'];
    $ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

    $conexion1 = conexionBaseDeDatos();

    $SQLnc1KmMercadoMunicipaldeArtesanias = "SELECT count(distancia) AS nc1KmDistancia FROM destinos WHERE distancia < 1 AND nombreDestino = 'Mercado Municipal de Artesanías'";
    $SQLnc4KmMercadoMunicipaldeArtesanias = "SELECT count(distancia) AS nc4KmDistancia FROM destinos WHERE distancia >= '1' AND distancia <'8' AND nombreDestino = 'Mercado Municipal de Artesanías'";
    $SQLnc8KmMercadoMunicipaldeArtesanias = "SELECT count(distancia) AS nc8KmDistancia FROM destinos WHERE distancia >= '8' AND distancia <'16' AND nombreDestino = 'Mercado Municipal de Artesanías'";
    $SQLncMas16KmMercadoMunicipaldeArtesanias = "SELECT count(distancia) AS nc16KmDistancia FROM destinos WHERE distancia >= '16' AND nombreDestino = 'Mercado Municipal de Artesanías'";
    $SQLnMercadoMunicipaldeArtesanias = "SELECT count(nombreDestino) AS nMercadoMunicipaldeArtesanias FROM destinos WHERE nombreDestino = 'MercadoMunicipaldeArtesanias'";


    $result0 = mysqli_query($conexion1, $SQLnMercadoMunicipaldeArtesanias);
    $values0 = mysqli_fetch_assoc($result0);
    $nMercadoMunicipaldeArtesanias = $values0['nMercadoMunicipaldeArtesanias'];

    $result1 = mysqli_query($conexion1, $SQLnc4KmMercadoMunicipaldeArtesanias);
    $values1 = mysqli_fetch_assoc($result1);
    $nc4KmMercadoMunicipaldeArtesanias = $values1['nc4KmDistancia'];

    $result2 = mysqli_query($conexion1, $SQLnc8KmMercadoMunicipaldeArtesanias);
    $values2 = mysqli_fetch_assoc($result2);
    $nc8KmMercadoMunicipaldeArtesanias = $values2['nc8KmDistancia'];

    $result3 = mysqli_query($conexion1, $SQLncMas16KmMercadoMunicipaldeArtesanias);
    $values3 = mysqli_fetch_assoc($result3);
    $nc16KmMercadoMunicipaldeArtesanias = $values3['nc16KmDistancia'];

    $result4 = mysqli_query($conexion1, $SQLnc1KmMercadoMunicipaldeArtesanias);
    $values4 = mysqli_fetch_assoc($result4);
    $nc1KmMercadoMunicipaldeArtesanias = $values4['nc1KmDistancia'];


    $p = 1 / 4; //es la cantidad de valores que puede tomar un atributo en este caso es 4 para todos
    $m = 2; //es a cantidad de atributos en este caso es 2

    $SQLcuentaRegistrosDistancia = 'SELECT COUNT(*) as cuentaRegistrosDistancia FROM destinos'; //se cuentan la cantidad de registros
    $result23 = mysqli_query($conexion1, $SQLcuentaRegistrosDistancia);
    $values23 = mysqli_fetch_assoc($result23);
    $registrosTotalesDistancia = $values23['cuentaRegistrosDistancia'];


    $pClassMercadoMunicipaldeArtesanias = $nMercadoMunicipaldeArtesanias / $registrosTotalesDistancia; //este dato también es necesario para el algoritmo (es la cantidad de veces que aparece esta clase dividido entre la cantidad de registros totales)
    //formula 
    //se arma la ecuación para hallar cada una de las probabilidades
    $calculoBayesMercadoMunicipaldeArtesanias1Km = ($nc1KmMercadoMunicipaldeArtesanias + $m * $p) / ($nMercadoMunicipaldeArtesanias + $m);
    $calculoBayesMercadoMunicipaldeArtesanias4Km = ($nc4KmMercadoMunicipaldeArtesanias + $m * $p) / ($nMercadoMunicipaldeArtesanias + $m);
    $calculoBayesMercadoMunicipaldeArtesanias8Km = ($nc8KmMercadoMunicipaldeArtesanias + $m * $p) / ($nMercadoMunicipaldeArtesanias + $m);
    $calculoBayesMercadoMunicipaldeArtesanias16Km = ($nc16KmMercadoMunicipaldeArtesanias + $m * $p) / ($nMercadoMunicipaldeArtesanias + $m);



    //ahora que tenemos todos los datos se realiza la multiplicación (como se indica en el documento)
    $calculoFinalParaMercadoMunicipaldeArtesanias = $pClassMercadoMunicipaldeArtesanias * $calculoBayesMercadoMunicipaldeArtesanias1Km * $calculoBayesMercadoMunicipaldeArtesanias4Km * $calculoBayesMercadoMunicipaldeArtesanias8Km * $calculoBayesMercadoMunicipaldeArtesanias16Km;

    //se obtiene el resultado de la probabilidad final para esa la clase volcanIrazu
    return $calculoFinalParaMercadoMunicipaldeArtesanias;
}

function generaTablaParaMuseoDeLosNinos() {

    $tiempoSeleccionado = $_POST['selectTime'];
    $distanciaSeleccionada = $_POST['selectDistance'];
    $ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

    $conexion1 = conexionBaseDeDatos();

    $SQLnc1KmMuseoDeLosNinos = "SELECT count(distancia) AS nc1KmDistancia FROM destinos WHERE distancia < 1 AND nombreDestino = 'Museo de los niños'";
    $SQLnc4KmMuseoDeLosNinos = "SELECT count(distancia) AS nc4KmDistancia FROM destinos WHERE distancia >= '1' AND distancia <'8' AND nombreDestino = 'Museo de los niños'";
    $SQLnc8KmMuseoDeLosNinos = "SELECT count(distancia) AS nc8KmDistancia FROM destinos WHERE distancia >= '8' AND distancia <'16' AND nombreDestino = 'Museo de los niños'";
    $SQLncMas16KmMuseoDeLosNinos = "SELECT count(distancia) AS nc16KmDistancia FROM destinos WHERE distancia >= '16' AND nombreDestino = 'Museo de los niños'";
    $SQLnMuseoDeLosNinos = "SELECT count(nombreDestino) AS nMuseoDeLosNinos FROM destinos WHERE nombreDestino = 'Museo de los niños'";


    $result0 = mysqli_query($conexion1, $SQLnMuseoDeLosNinos);
    $values0 = mysqli_fetch_assoc($result0);
    $nMuseoDeLosNinos = $values0['nMuseoDeLosNinos'];

    $result1 = mysqli_query($conexion1, $SQLnc4KmMuseoDeLosNinos);
    $values1 = mysqli_fetch_assoc($result1);
    $nc4KmMuseoDeLosNinos = $values1['nc4KmDistancia'];

    $result2 = mysqli_query($conexion1, $SQLnc8KmMuseoDeLosNinos);
    $values2 = mysqli_fetch_assoc($result2);
    $nc8KmMuseoDeLosNinos = $values2['nc8KmDistancia'];

    $result3 = mysqli_query($conexion1, $SQLncMas16KmMuseoDeLosNinos);
    $values3 = mysqli_fetch_assoc($result3);
    $nc16KmMuseoDeLosNinos = $values3['nc16KmDistancia'];

    $result4 = mysqli_query($conexion1, $SQLnc1KmMuseoDeLosNinos);
    $values4 = mysqli_fetch_assoc($result4);
    $nc1KmMuseoDeLosNinos = $values4['nc1KmDistancia'];


    $p = 1 / 4; //es la cantidad de valores que puede tomar un atributo en este caso es 4 para todos
    $m = 2; //es a cantidad de atributos en este caso es 2

    $SQLcuentaRegistrosDistancia = 'SELECT COUNT(*) as cuentaRegistrosDistancia FROM destinos'; //se cuentan la cantidad de registros
    $result23 = mysqli_query($conexion1, $SQLcuentaRegistrosDistancia);
    $values23 = mysqli_fetch_assoc($result23);
    $registrosTotalesDistancia = $values23['cuentaRegistrosDistancia'];


    $pClassMuseoDeLosNinos = $nMuseoDeLosNinos / $registrosTotalesDistancia; //este dato también es necesario para el algoritmo (es la cantidad de veces que aparece esta clase dividido entre la cantidad de registros totales)
    //formula 
    //se arma la ecuación para hallar cada una de las probabilidades
    $calculoBayesMuseoDeLosNinos1Km = ($nc1KmMuseoDeLosNinos + $m * $p) / ($nMuseoDeLosNinos + $m);
    $calculoBayesMuseoDeLosNinos4Km = ($nc4KmMuseoDeLosNinos + $m * $p) / ($nMuseoDeLosNinos + $m);
    $calculoBayesMuseoDeLosNinos8Km = ($nc8KmMuseoDeLosNinos + $m * $p) / ($nMuseoDeLosNinos + $m);
    $calculoBayesMuseoDeLosNinos16Km = ($nc16KmMuseoDeLosNinos + $m * $p) / ($nMuseoDeLosNinos + $m);



    //ahora que tenemos todos los datos se realiza la multiplicación (como se indica en el documento)
    $calculoFinalParaMuseoDeLosNinos = $pClassMuseoDeLosNinos * $calculoBayesMuseoDeLosNinos1Km * $calculoBayesMuseoDeLosNinos4Km * $calculoBayesMuseoDeLosNinos8Km * $calculoBayesMuseoDeLosNinos16Km;

    //se obtiene el resultado de la probabilidad final para esa la clase volcanIrazu
    return $calculoFinalParaMuseoDeLosNinos;
}

function generaTablaParaMuseoBancoCentral() {
    $tiempoSeleccionado = $_POST['selectTime'];
    $distanciaSeleccionada = $_POST['selectDistance'];
    $ubicacionPredeterminadaEspecifica = $_POST["selectGeneralLocation"];

    $conexion1 = conexionBaseDeDatos();

    $SQLnc1KmMuseodelBancoCentraldeCostaRica = "SELECT count(distancia) AS nc1KmDistancia FROM destinos WHERE distancia < 1 AND nombreDestino = 'Museo del Banco Central de Costa Rica'";
    $SQLnc4KmMuseodelBancoCentraldeCostaRica = "SELECT count(distancia) AS nc4KmDistancia FROM destinos WHERE distancia >= '1' AND distancia <'8' AND nombreDestino = 'Museo del Banco Central de Costa Rica'";
    $SQLnc8KmMuseodelBancoCentraldeCostaRica = "SELECT count(distancia) AS nc8KmDistancia FROM destinos WHERE distancia >= '8' AND distancia <'16' AND nombreDestino = 'Museo del Banco Central de Costa Rica'";
    $SQLncMas16KmMuseodelBancoCentraldeCostaRica = "SELECT count(distancia) AS nc16KmDistancia FROM destinos WHERE distancia >= '16' AND nombreDestino = 'Museo del Banco Central de Costa Rica'";
    $SQLnMuseodelBancoCentraldeCostaRica = "SELECT count(nombreDestino) AS nMuseodelBancoCentraldeCostaRica FROM destinos WHERE nombreDestino = 'Museo del Banco Central de Costa Rica'";


    $result0 = mysqli_query($conexion1, $SQLnMuseodelBancoCentraldeCostaRica);
    $values0 = mysqli_fetch_assoc($result0);
    $nMuseodelBancoCentraldeCostaRica = $values0['nMuseodelBancoCentraldeCostaRica'];

    $result1 = mysqli_query($conexion1, $SQLnc4KmMuseodelBancoCentraldeCostaRica);
    $values1 = mysqli_fetch_assoc($result1);
    $nc4KmMuseodelBancoCentraldeCostaRica = $values1['nc4KmDistancia'];

    $result2 = mysqli_query($conexion1, $SQLnc8KmMuseodelBancoCentraldeCostaRica);
    $values2 = mysqli_fetch_assoc($result2);
    $nc8KmMuseodelBancoCentraldeCostaRica = $values2['nc8KmDistancia'];

    $result3 = mysqli_query($conexion1, $SQLncMas16KmMuseodelBancoCentraldeCostaRica);
    $values3 = mysqli_fetch_assoc($result3);
    $nc16KmMuseodelBancoCentraldeCostaRica = $values3['nc16KmDistancia'];

    $result4 = mysqli_query($conexion1, $SQLnc1KmMuseodelBancoCentraldeCostaRica);
    $values4 = mysqli_fetch_assoc($result4);
    $nc1KmMuseodelBancoCentraldeCostaRica = $values4['nc1KmDistancia'];


    $p = 1 / 4; //es la cantidad de valores que puede tomar un atributo en este caso es 4 para todos
    $m = 2; //es a cantidad de atributos en este caso es 2

    $SQLcuentaRegistrosDistancia = 'SELECT COUNT(*) as cuentaRegistrosDistancia FROM destinos'; //se cuentan la cantidad de registros
    $result23 = mysqli_query($conexion1, $SQLcuentaRegistrosDistancia);
    $values23 = mysqli_fetch_assoc($result23);
    $registrosTotalesDistancia = $values23['cuentaRegistrosDistancia'];


    $pClassMuseodelBancoCentraldeCostaRica = $nMuseodelBancoCentraldeCostaRica / $registrosTotalesDistancia; //este dato también es necesario para el algoritmo (es la cantidad de veces que aparece esta clase dividido entre la cantidad de registros totales)
    //formula 
    //se arma la ecuación para hallar cada una de las probabilidades
    $calculoBayesMuseodelBancoCentraldeCostaRica1Km = ($nc1KmMuseodelBancoCentraldeCostaRica + $m * $p) / ($nMuseodelBancoCentraldeCostaRica + $m);
    $calculoBayesMuseodelBancoCentraldeCostaRica4Km = ($nc4KmMuseodelBancoCentraldeCostaRica + $m * $p) / ($nMuseodelBancoCentraldeCostaRica + $m);
    $calculoBayesMuseodelBancoCentraldeCostaRica8Km = ($nc8KmMuseodelBancoCentraldeCostaRica + $m * $p) / ($nMuseodelBancoCentraldeCostaRica + $m);
    $calculoBayesMuseodelBancoCentraldeCostaRica16Km = ($nc16KmMuseodelBancoCentraldeCostaRica + $m * $p) / ($nMuseodelBancoCentraldeCostaRica + $m);



    //ahora que tenemos todos los datos se realiza la multiplicación (como se indica en el documento)
    $calculoFinalParaMuseodelBancoCentraldeCostaRica = $pClassMuseodelBancoCentraldeCostaRica * $calculoBayesMuseodelBancoCentraldeCostaRica1Km * $calculoBayesMuseodelBancoCentraldeCostaRica4Km * $calculoBayesMuseodelBancoCentraldeCostaRica8Km * $calculoBayesMuseodelBancoCentraldeCostaRica16Km;

    //se obtiene el resultado de la probabilidad final para esa la clase volcanIrazu
    return $calculoFinalParaMuseodelBancoCentraldeCostaRica;
}

function listaMenores() {

    $listaMenores = array();
    array_push($listaMenores, generaTablaParaMercadoMunicipal());
    array_push($listaMenores, generaTablaParaMuseoBancoCentral());
    array_push($listaMenores, generaTablaParaMuseoDeLosNinos());
    array_push($listaMenores, generaTablaParaParqueFrancia());
    array_push($listaMenores, generaTablaParaVolcanIrazu());
    
    
 

}