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
         <style>
* {
  box-sizing: border-box;
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

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
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

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
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
       
 
<div class="container">
    <form action="../Data/BuscarSitioTuristico.php" method="post">
       <center>
        <font color="blue" face="times" size=26>
        Buscar sitio turistico
        </font>
    </center>
  <div class="row">
    <div class="col-25">
      <label for="fname">Nombre del destino</label>
    </div>
    <div class="col-75">
       <select name="nombre">
        
        <?php
        include '../Data/conexionBaseDeDatos.php';
           $conexion = conexionBaseDeDatos();
          $query = ("SELECT * FROM destinos");
             $result = mysqli_query($conexion, $query);
          while ($valores = mysqli_fetch_array($result)) {
            echo '<option value="'.$valores[idDestino].'">'.$valores[nombreDestino].'</option>';
          }
        ?>
      </select>
    </div>
      </div>
        
        <div class="row">
    <div class="col-50">
        <input type="submit" name="editar" value ="Editar"> 
            
        <input type="submit" name="eliminar" value ="Eliminar">
    </div>
     
   
    </form>

</div>



    <div class="footer">
        <p>Tu destino soñado</p>
        <p>Creadores: Josseline Matamoros</p>
        <p>Alfonso Jiménez</p>
        <p>Versión 1.0</p>
    </div>
</body>
</html>
