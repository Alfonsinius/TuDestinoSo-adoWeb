<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <?php
    include '../View/Menu.html';
    ?>

    <body style="background-color:#273746;">

       
    <center>
        <div class="container">
            
             <h3 style="color:white; background-color:#2874A6">Deseamos conocer tú ubicación para ser más certeros en nuestra búsqueda, recuerda que
            toda la información proporcionada es 100% confidencial, también puedes escoger una de nuestras ubicaciones predeterminadas.</h3>
            
            <form action="" method="post" > 
                <button type="submit" class="btn btn-primary" style="margin-left:-50%; margin-top: 10%;">Utilizar mi ubicación</button>
            </form>  
        </div>

        
        <div class="container">
            
            <form action="../View/PredesignLocation.php" method="post" > 
                <button type="submit" class="btn btn-primary" style="margin-left:30%;margin-top: -60px;">Ubicaciones predeterminadas</button>
            </form>

        </div>

</center>

    </body>
</html>
