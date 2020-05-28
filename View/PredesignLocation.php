<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php
include '../View/Menu.html';
?>
    <body style="background-color:#273746;">
    
        <div class="container">
    
   <h3 style="color:white; background-color:#2874A6">Seleccione una de la ubicaciones predeterminadas.</h3>
               
  <div class="dropdown" style="margin-left: 40%">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lugar de inicio
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        
      <li><a href="#">Cartago Centro</a></li>
      <li><a href="#">Turrialba</a></li>
      <li><a href="#">Oreamuno</a></li>
      
    </ul>
  </div>
   
   <div class="dropdown" style="margin-top: 10%; margin-left:40%">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Punto de referencia
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        
      <li><a href="#">Básilica de los Angeles</a></li>
      <li><a href="#">Ruinas de Cartago</a></li>
      <li><a href="#">Iglesia Maria Auxiliadora</a></li>
      
    </ul>
  </div>
   </div>
        
    <div class="container">
            
            <form action="" method="post" > 
                <button type="submit" class="btn btn-success" style="margin-left:80%;">Continuar</button>
            </form>

        </div>


    
</body>
</html>
