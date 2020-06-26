<?php

include '../Data/conexionBaseDeDatos.php';
 $conexion = conexionBaseDeDatos();

 
 
$nombre= $_POST['nombre'];

if ($_POST[editar]) { 
    
  
    header ("Location:../View/EditTouristSites.php?idDestino=$nombre");
}else if ($_POST[eliminar]) { 
    $query = "Delete FROM `destinos` WHERE idDestino=$nombre";
     // ejecuto consulta en la base
     
      if (mysqli_query($conexion, $query)) {
      
      header ("Location:../View/ManageTouristSites.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
}

mysqli_close($conexion);
?>