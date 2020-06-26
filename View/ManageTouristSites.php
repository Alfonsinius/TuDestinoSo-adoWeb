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

        <!-- <div class="container">
             <a href="#" class="btn btn-info btn-lg" style="background-color:red">
               <span class="glyphicon glyphicon-trash"></span> Eliminar sitio 
             </a>
           </p>    
         </div>-->
    <td> <a href="../View/CreateTouristSite.php" class="btn btn-info btn-lg" style = "background-color:green">
            <span class="glyphicon glyphicon-plus-sign" spellcheck="color:#ffffff" ></span> Crear sitio turístico</td></a>

<div class="container">
    <h2 style="color: #ffffff">Lista de sitios turísticos</h2>
    <p style="color: #ffffff">Acá podrá visualizar y gestionar todos los sitios turísticos del sistema.</p>            
    <table class="table" >
        <thead>
            <tr>
                <th style="color: #ffffff">ID</th>
                <th style="color: #ffffff">Nombre</th>
                <th style="color: #ffffff">Descripción</th>
                <th style="color: #ffffff">Provincia</th>
                
            </tr>
        </thead>
        <tbody  >
            <?php
            //incluyo el archivo con la información de la base
            include '../Data/conexionBaseDeDatos.php';
            //consulta  para extraer los servicios con fecha menor a la actual
            $conexion = conexionBaseDeDatos();
            $query = "SELECT * FROM `destinos` WHERE 1 ";
            // ejecuto consulta en la base
            $result = mysqli_query($conexion, $query);
            //extraigo el resultado de la base
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td width=\"10%\"><font face=\"verdana\" color=\"white\">" . $row["idDestino"]
                . "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\" color=\"white\">" .
                $row["nombreDestino"] . "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\"color=\"white\">" .
                $row["descripcion"] . "</font></td>";
                echo "<td width=\"25%\"><font face=\"verdana\"color=\"white\">" .
                $row["provincia"] . "</font></td>";
              
            }



            mysqli_close($conexion);
            ?>

        </tbody>
    </table>
</div>
</body>
</html>
