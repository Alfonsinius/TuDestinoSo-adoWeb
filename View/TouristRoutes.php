<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
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
        include '../View/Menu.html';
        ?>
        
    <center>
        <font color="white" face="times" size=26>
        Rutas turistica
        </font>
    </center>
    <div  style="position: absolute; width: 500px; height: 10px; padding: 10px; top: 150px; right: 2px; z-index: 1;">
         <p style="color:white"> <FONT SIZE=4 FACE="times new roman">Nombre del sitio que desea ver detalles:</FONT></p>
        <input type="text" id="fname" name="descripcion" value=""><br>
        
       
      <br>
    <br>
        <a  class="button button3" href="../View/DetailTouristSites.php" role="button">Ver detalles</a>
      
    </div>
       

      <div class="col-md-12 col-xs-10 col-sm-10" position="right">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d62892.93276820737!2d-83.9221248!3d9.8664448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scr!4v1590641552989!5m2!1ses!2scr" frameborder="0" allowfullscreen=""style="width:45%;height:300px;" aria-hidden="false" tabindex="0"></iframe>
    </div>
     <div class="col-md-20 col-xs-20 col-sm-20">
           <button class="button button3">Ruta 1</button>
            <button class="button button3">Ruta 2</button>
             <button class="button button3">Ruta 3 </button>
     </div>
    
     
        
  
    
    
    <div class="footer">
        <p>Tu destino soñado</p>
        <p>Creadores: Josseline Matamoros</p>
        <p>Alfonso Jiménez</p>
        <p>Versión 1.0</p>
    </div>
</body>
</html>
