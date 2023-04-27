<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header ("content-Type: text/html; cherset=UTF-8");

$noUnidad = isset($_POST ['noUnidad']) ? $_POST ['noUnidad']: '';
$placas = isset($_POST ['placas']) ? $_POST ['placas']: '';
$modelo = isset($_POST ['modelo']) ? $_POST ['modelo']: '';
$marca = isset($_POST ['marca']) ? $_POST ['marca']: '';
$noUnidad2 = '';


$con= new SQLite3('tuvsaUnidades.db');


$cs = $con -> query ("SELECT * FROM registro");


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>PAGINA ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        
    </head>
    <body>
        <style>
            img{
                text-align: center;       
            }
        </style>
        <div class="row">
            <div class="col-md-8 mx-auto" style="text-align: center;">
                <div class="my-5 mx-auto">
                    <img src="img/LOGO_TUVSA_DRAGON.svg" alt="logo" class="img-fluid">
                        <h1 class="my-4">Scanee su codigo de barras</h1>
                            <br>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="noUnidad">

                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                </div>

                        <div class="col-md-12">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Eco</th>
                                        <th>Placas</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <!-- <th>Hora</th> -->
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while ($result=$cs -> fetchArray()){
                                        ?>
                                            <tr>
                                                <th><?php  echo $result['noUnidad']?></th>
                                                <th><?php  echo $result['placas']?></th>
                                                <th><?php  echo $result['modelo']?></th>
                                                <th><?php  echo $result['marca']?></th>
                                                <!-- <th></th> -->    
                                                <!-- <th><a href="#" class="btn btn-danger">Eliminar</a></th> -->                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                      
            </div>
        </div>
    </body>
</html>