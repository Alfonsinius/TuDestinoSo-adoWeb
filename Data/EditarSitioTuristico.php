<?php

include '../Data/conexionBaseDeDatos.php';
 $conexion = conexionBaseDeDatos();

 
 $id=$_POST['id'];
$nombre= $_POST['nombre'];
$precio=$_POST["precio"];
$descripcion=$_POST["descripcion"];
$provincia=$_POST["provincia"];
$imagen=$_POST["imagen"];
$ejex=floatval ( $_POST["ejex"]);
$ejey=floatval ( $_POST["ejey"]);

// Check connection
if (!$conexion) {
      die("Connection failed: " . mysqli_connect_error());
}
 


    


$sql = "UPDATE `destinos` SET `nombreDestino`='$nombre',`descripcion`='$descripcion',`ubicacionX`=$ejex,`ubicacionY`=$ejey,`imagen`='$imagen',`precio`=$precio,`provincia`='$provincia' WHERE `idDestino`= $id ";
if (mysqli_query($conexion, $sql)) {
      echo "Destino editado con exito";
      header ("Location:../View/ManageTouristSites.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);
?>