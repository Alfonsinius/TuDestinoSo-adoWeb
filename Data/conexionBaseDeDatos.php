<?php

  function  conexionBaseDeDatos(){
    
    $conexion = mysqli_connect('163.178.107.10', 'laboratorios', 'UCRSA.118', 'tudestino');
    
    if(!$conexion){
        echo 'No se pudo conectar a la base de datos';
    }   
    return $conexion;


    }
?>

