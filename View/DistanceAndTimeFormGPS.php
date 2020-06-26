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
            <form action="../Data/RutaUnoAlgoritmoEuclidesUbicacionGPS.php" method="post" > 
                <center>
                    <h3 style="color:white;">Seleccione la opción que más le convenga.</h3>
                </center> 

                <h3 style="color:white"><center><strong>Seleccione el tiempo que desea invertir en el viaje.</strong></center></h3>
                <select name="selectTime" id="framework" class="form-control selectpicker">   

                    <option value="1">Menos de 1 hora</option>
                    <option value="2">Menos de 2 horas</option>
                    <option value="3">Menos de 4 horas</option>
                    <option value="4">Menos de 6 horas</option>
                    <option value="4">Más de 6 horas</option>
                </select>


                <h3 style="color:white"> <center><strong>Seleccione la cantidad de kilométros que desea viajar.</strong></center></h3>
                <select name="selectDistance" id="framework" class="form-control selectpicker">   

                    <option value="1">Menos de 1 kilométro</option>
                    <option value="2">Menos de 4 kilométros</option>
                    <option value="3">Menos de 8 kilométros</option>
                    <option value="4">Menos de 16 kilométros</option>
                    <option value="4">Más de 16 kilométros</option>
                </select>


                
                <button type="submit" class="btn btn-success"style="margin-left:80%; margin-top: 5%">Continuar</button>
            </form>
        </div>





    </body>
</html>