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


        </style>
    </head>
    <body style="background-color:#273746;">

        <?php
        include '../View/MenuLogedInUser.php';
        ?>
    <center>
        <font color="white" face="times" size=30>
        Créditos
        </font>
         <br>
        <font color="white" face="times" size=16>
        Curso sistemas expertos

        </font>
        <br>
        <font color="white" face="times" size=16>
        Creado por: 
        </font>
        <br>
        <font color="white" face="times" size=14>
        Josseline Matamoros
        </font>
        <br>
        <font color="white" face="times" size=14>
        Alfonso Jiménez
        </font>
        <br>
        <font color="white" face="times" size=16>
        Versión 1.0 
        </font>


    </center>
    <br>
    <br>
    <br>
    <div class="footer">
        <p>Tu destino soñado</p>
        <p>Creadores: Josseline Matamoros</p>
        <p>Alfonso Jiménez</p>
        <p>Versión 1.0</p>
    </div>

</body>
</html>
