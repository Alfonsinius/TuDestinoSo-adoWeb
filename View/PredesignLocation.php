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
               
   <center><strong>Lugar de inicio.</strong></center>
  <select name="selectTime" id="framework" class="form-control selectpicker">   

                        <option value="1">Cartago Centro</option>
                        <option value="2">Turrialba</option>                 
                        <option value="4">Oreamuno</option>
                       
                    </select>
   </div>
   
   <center><strong>Punto de referencia.</strong></center>
  <select name="selectTime" id="framework" class="form-control selectpicker">   

                        <option value="1">Básilica de los Angeles</option>
                        <option value="2">Ruinas de Cartago</option>                 
                        <option value="4">Iglesia Maria Auxiliadora</option>
                       
                    </select>
   </div>
        
    <div class="container">
            
        <form action="../View/DistanceAndTimeForm.php" method="post" > 
                <button type="submit" class="btn btn-success" style="margin-left:80%;">Continuar</button>
            </form>

        </div>


    
</body>
</html>
