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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body style="background-color:#273746;">

        <?php
        include '../View/MenuLogedInUser.php';
        ?>
    <center>
        <font color="white" face="times" size=26>
        Editar sitio turistico
        </font>
    </center>

    <div class="col-md-12 col-xs-10 col-sm-10" style="text-align: center">
        <p style="color:white"> <FONT SIZE=4 FACE="times new roman">Nombre del sitio turistico</FONT></p>

    </div>
    <div class="col-md-12 col-xs-12 col-sm-12" style="text-align: center">
        <input type="text" id="fname" name="nombre" value="">
    </div>
    <div class="col-md-12 col-xs-16 col-sm-16" style="text-align: center">
        <p style="color:white"> <FONT SIZE=4 FACE="times new roman">Ubicación del sitio</FONT></p>

    </div>
    <div class="col-md-12 col-xs-18 col-sm-18" style="text-align: center">
        <input type="text" id="fname" name="ubicacion" value="">
    </div>
    <div class="col-md-12 col-xs-18 col-sm-18" style="text-align: center">
        <p style="color:white"> <FONT SIZE=4 FACE="times new roman">Descripción del sitio</FONT></p>

    </div>
    <div class="col-md-12 col-xs-18 col-sm-18" style="text-align: center">
        <input type="text" id="fname" name="descripcion" value=""><br>
    </div>
 <div class="col-md-12 col-xs-18 col-sm-18" style="text-align: center">
       <p style="color:white"> <FONT SIZE=4 FACE="times new roman">Link imagen del sitio</FONT></p>
   
    </div>

 <div class="col-md-12 col-xs-18 col-sm-18" style="text-align: center">
       <input type="text" id="fname" name="imagen" value=""><br>
    </div>
   
    <br>
    <br>
    <div class="col-md-14 col-xs-14 col-sm-14" style="text-align: center">
        <button class="button button3">Editar</button>
        <button class="button button3">Cancelar</button>
    </div>





    <div class="footer">
        <p>Tu destino soñado</p>
        <p>Creadores: Josseline Matamoros</p>
        <p>Alfonso Jiménez</p>
        <p>Versión 1.0</p>
    </div>
</body>
</html>
