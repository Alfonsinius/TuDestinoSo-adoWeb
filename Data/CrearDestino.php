<?php

include '../Data/conexionBaseDeDatos.php';
 $conexion = conexionBaseDeDatos();

 
 
$nombre= $_POST['nombre'];
$precio=$_POST["precio"];
$descripcion=$_POST["descripcion"];
$provincia=$_POST["provincia"];
$imagen=$_POST["imagen"];
$ejex=floatval ( $_POST["ejex"]);
$ejey=floatval ( $_POST["ejey"]);
$id=0;
 
// Check connection
if (!$conexion) {
      die("Connection failed: " . mysqli_connect_error());
}
 


    
    
$idNum="SELECT COUNT(`nombreDestino`) as cantidad FROM `destinos` ";
$result = mysqli_query($conexion, $idNum);
 $valuesEtc = mysqli_fetch_assoc($result);
    $cantidad= $valuesEtc['cantidad'];
$id=$cantidad+1;

$sql = "INSERT INTO `destinos`(`nombreDestino`, `descripcion`, `ubicacionX`, `ubicacionY`, `imagen`, `precio`, `provincia`, `idDestino`) VALUES ('$nombre','$descripcion',$ejex,$ejey,'$imagen',$precio,'$provincia',$id)";
if (mysqli_query($conexion, $sql)) {
      echo "Destino insertado con exito";
      header ("Location:../View/ManagerTouristSites.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);
?>