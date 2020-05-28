<?php
include '../View/MenuLogedInUser.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#273746;">

        <!-- <div class="container">
             <a href="#" class="btn btn-info btn-lg" style="background-color:red">
               <span class="glyphicon glyphicon-trash"></span> Eliminar sitio 
             </a>
           </p>    
         </div>-->
     <td> <a href="#" class="btn btn-info btn-lg" style = "background-color:green">
                        <span class="glyphicon glyphicon-plus-sign" spellcheck="color:#ffffff"></span> Crear sitio turístico</td></a>

        <div class="container">
            <h2 style="color: #ffffff">Lista de sitios turísticos</h2>
            <p style="color: #ffffff">Acá podrá visualizar y gestionar todos los sitios turísticos del sistema.</p>            
            <table class="table" >
                <thead>
                    <tr>
                        <th style="color: #ffffff">ID</th>
                        <th style="color: #ffffff">Nombre</th>
                        <th style="color: #ffffff">Descripción</th>
                        <th style="color: #ffffff">Ubicación</th>
                        <th style="color: #ffffff">Acciones</th>
                    </tr>
                </thead>
                <tbody  >
                    <tr>
                        <td style="color: #ffffff" >1</td>
                        <td style="color: #ffffff" id="nombre">Playa Manzanillo</td>
                        <td style="color: #ffffff" >Paraíso tropical con asombrosos arrecifes de córal</td>
                        <td style="color: #ffffff">Puntarenas</td>
                        
                        <td style="color: #ffffff"><a href="#" class="btn btn-info btn-lg" style="background-color:red">
                                <span class="glyphicon glyphicon-trash" style="color: #ffffff"></span> Eliminar sitio 
                            </a></td>

                               <?php echo $datos->getTicket(); ?>
                            <td> <a method="get" action="DetailTouristSites.php" href="../View/DetailTouristSites.php" class="btn btn-info btn-lg" style = "background-color:green">
                        <span class="glyphicon glyphicon-edit" spellcheck="color:#ffffff" ></span> Editar</td></a>

                        
                    </tr>
                    <tr>
                        <td style="color: #ffffff">2</td>
                        <td style="color: #ffffff">Volcán Irazú</td>
                        <td style="color: #ffffff" >Es el volcán más alto de Costa Rica y ofrece una asombrosa vista.</td>
                        <td style="color: #ffffff" >Cordillera central, cerca de la ciudad de Cartago</td>
                        <td><a href="#" class="btn btn-info btn-lg" style="background-color:red">
                                <span class="glyphicon glyphicon-trash" style="color: #ffffff"></span> Eliminar sitio 
                            </a>

                        </td>
                          <td> <a href="#" class="btn btn-info btn-lg" style = "background-color:green">
                        <span class="glyphicon glyphicon-edit" spellcheck="color:#ffffff" method="post" action="DetailTouristSites.php"></span> Editar</td></a>
                    </tr>
                    <tr>
                        <td style="color: #ffffff">3</td>
                        <td style="color: #ffffff">Mirador de Orosí</td>
                        <td style="color: #ffffff">Es un lugar especial si quieres pasar tiempo en familia o pasar tiempo con tu pareja, admirando el precioso paisaje</td>
                        <td style="color: #ffffff">Orosi, Cartago</td>
                        <td><a href="#" class="btn btn-info btn-lg" style="background-color:red">
                                <span class="glyphicon glyphicon-trash" style="color: #ffffff"></span> Eliminar sitio 
                            </a>
                            </p>
                        </td>
                        
                          <td> <a href="#" class="btn btn-info btn-lg" style = "background-color:green">
                        <span class="glyphicon glyphicon-edit" spellcheck="color:#ffffff" ></span> Editar</td></a>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
