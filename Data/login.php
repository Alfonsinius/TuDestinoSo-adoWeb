
<?php

/*
 * En esta clase se verifica que el usuario este ingresado con anterioridad en el sistema 
 */

include ("./conexionBaseDeDatos.php");
$conexion = conexionBaseDeDatos();

$username = $_POST['usuario'];
$password = $_POST['psw'];
//Se llaman los datos de la base de datos mySQL haciendo la consulta 

if($conexion){
    //Usuario Administrador contraseña expertos2020
    $request = "SELECT userName as u FROM usuarios where userName='$username' and password= '$password'";

 // obtiene el resultado de la consulta 
$data = mysqli_query($conexion, $request);

     
       $row = mysqli_fetch_array($data);
          if($row>0){
               header ("Location:../View/ManageTouristSites.php");
            }else{
                echo "Datos incorrectos intente de nuevo";
               header ("Location:../View/Login.php");
            }
                
                
        

}  else {
    echo "Error en conexión";
}



mysqli_close($conexion);
?>

