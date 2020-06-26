<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
 <style>
* {
  box-sizing: border-box;
}


label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


</style>
 
        <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: black;
                color: white;
                text-align: center;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                background-color: #111;
            }

            .active {
                background-color: #4CAF50;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .button3 {padding: 14px 40px;}
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body style="background-color:#273746;">

        <?php
include '../View/MenuLogedInUser.php';
?>
        
         <?php
         include '../Data/conexionBaseDeDatos.php';
         
        $id= $_GET["idDestino"]; 
 $conexion = conexionBaseDeDatos();
$query = "SELECT * FROM `destinos` WHERE idDestino=$id ";
     // ejecuto consulta en la base
      $result = mysqli_query($conexion, $query);
            //extraigo el resultado de la base
            while ($row = mysqli_fetch_array($result)) {
                    
                $idDestino=$row['idDestino'];
                $nombreDestino=$row['nombreDestino'];
                $descripcion=$row['descripcion'];
                $ejex=$row['ubicacionX'];
                $ejey=$row['ubicacionY'];
                $provincia=$row['provincia'];
                $imagen=$row['imagen'];
                $precio=$row['precio'];
            }
?>
   
<div class="container">
    <form action="../Data/EditarSitioTuristico.php" method="post">
       <center>
        <font color="blue" face="times" size=26>
        Editar sitio turistico
        
        </font>
          <div class="row">
    <div class="col-25">
      <label for="fname">ID del destino</label>
    </div>
    <div class="col-75">
       
      <input type="text"  name="id"  readonly="readonly"  value="<?php echo $idDestino ?> "required>
    </div>
    </center>
      
  <div class="row">
    <div class="col-25">
      <label for="fname">Nombre del destino</label>
    </div>
    <div class="col-75">
       
      <input type="text"  name="nombre"  value="<?php echo $nombreDestino ?> "required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Provincia</label>
    </div>
    <div class="col-75">
      <input type="text"  name="provincia"  value="<?php echo $provincia ?>" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Link imagen</label>
    </div>
    <div class="col-75">
      <input type="text"  name="imagen" value="<?php echo $imagen ?>" >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="country">Precio</label>
    </div>
    <div class="col-75">
      <input type="number"  name="precio" value="<?php echo $precio ?>"  required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Descripcion</label>
    </div>
    <div class="col-75">
      <textarea required name="descripcion"   ><?php echo $descripcion ?></textarea>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="subject">Ubicacion en eje x</label>
    </div>
    <div class="col-75">
        <input type="number" step="any"  name="ejex" value="<?php echo $ejex ?>"  required >
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Ubicacion en eje y</label>
    </div>
    <div class="col-75">
        <input type="number" step="any"  name="ejey" value="<?php echo $ejey ?>" required>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Editar">
  </div>
  </form>
    
</div>
        <br>


    
</body>
</html>
